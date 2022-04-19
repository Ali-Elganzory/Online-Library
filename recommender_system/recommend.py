import sys
import time

import schedule
import pandas as pd
import numpy as np

import recommender_system.database as db

# Config
K = 5  # number of the closest users to predict from
MIN_RATING = 4  # min rating to recommend a book


def df_to_user_item_matrix(df: pd.DataFrame) -> (np.ndarray, pd.DataFrame):
    # pivot user_id and item_id columns.
    df_user_item = df[['user_id', 'book_id', 'rating']].pivot(
        index='book_id', columns='user_id', values='rating')

    # fill unavailable ratings with 0.
    df_user_item.fillna(0, inplace=True)

    return df_user_item.values, df_user_item


def cosine_similarity(m: np.ndarray):
    m2 = np.sqrt((m ** 2).sum(axis=0)).reshape((m.shape[1], 1))
    num = m.T @ m
    den = m2 @ m2.T
    np.seterr(invalid='ignore')
    res = num / den
    np.seterr(invalid='warn')
    return res


def update_book_recommendations():
    # load data
    df: pd.DataFrame = db.all_ratings()

    # get (user * item) matrix
    ui_m, df_user_item = df_to_user_item_matrix(df)

    # normalize user ratings
    user_means = ui_m.sum(axis=0) / (ui_m != 0).sum(axis=0)
    ui_m_norm = ui_m - np.sign(ui_m) * user_means

    # predict
    similarity: np.ndarray = cosine_similarity(ui_m_norm)
    sorted_idx: np.ndarray = np.argsort(similarity, axis=0)
    similar_user_ratings: np.ndarray = ui_m_norm[:, sorted_idx[-(K + 1):-1]]
    ui_m_predict: np.ndarray = similar_user_ratings.mean(axis=1)
    ui_m_predict += user_means

    # remove true ratings (books already rated by users)
    ui_m_predict[ui_m != 0] = 0

    # select only the books with predicted ratings of MIN_RATING or higher
    ui_m_predict[ui_m_predict < MIN_RATING] = 0
    ui_m_predict[ui_m_predict == 0] = np.NAN

    # unpivot to get ratings dataframe
    df_predict = pd.DataFrame(ui_m_predict, columns=df_user_item.columns, index=df_user_item.index)
    df_ratings_predict = df_predict.melt(var_name='user_id',
                                         value_name='rating',
                                         ignore_index=False)

    # drop not recommended books
    df_recommendations = df_ratings_predict.dropna()

    # save the recommended books to database
    db.save_recommendations(df_recommendations)

    print(f"Made {len(df_recommendations)} book recommendation{'s' if len(df_recommendations) > 1 else ''}.")


def main():
    # parse args
    if len(sys.argv) > 1:
        # [repeat] flag signals the script to
        # continue updating the recommendations periodically.
        if sys.argv[1].casefold() == 'repeat'.casefold():
            interval = int(sys.argv[2]) if len(sys.argv) > 2 else 10
            schedule.every(interval).seconds.do(update_book_recommendations)
            while True:
                schedule.run_pending()
                time.sleep(1)

        # update the recommendations once
        elif sys.argv[1].casefold() == 'once'.casefold():
            update_book_recommendations()
            exit()

        # help
        elif sys.argv[1].casefold() == 'help'.casefold():
            print('The available options are:')

        # unknown flag
        else:
            print(f'"{sys.argv[1]}" option is unknown. The available options are:')

        options = [['repeat', '[interval]', 'Run the recommender periodically every [interval] seconds, default 10.'],
                   ['once', '', '(default) Run the recommender once and exit.']]
        for option, parameter, desc in options:
            print(f'\t{f"{option} {parameter}":<20} - {desc}')
        exit()

    # default to 'once'
    else:
        update_book_recommendations()


if __name__ == '__main__':
    main()
