<link rel="stylesheet" href="views/partials/bookcard/bookcard.css">
<script>
    function fav(id){
        let heart = document.getElementById(id);
        if(heart.style.fill==="red"){
            heart.style.fill = "white";
            heart.style.stroke = "gray";
        } else {
            heart.style.fill = "red";
            heart.style.stroke = "white";
        }
    }
</script>
<div class="boxes">
    <svg width="210px" height="310px" style="border-radius: 20px;">
        <defs>
            <filter id="text-filter" x="0" y="0" width="110%" height="110%">
                <feOffset result="offOut" in="SourceGraphic" dx="3" dy="3" />
                <feGaussianBlur result="blurOut" in="offOut" stdDeviation="5" />
                <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
            </filter>
        </defs>

        <defs>
            <clipPath id="cut-off-bottom">
                <rect x="0" y="0" width="100%" height="190px" />
            </clipPath>
            <clipPath id="cut-off-top">
                <rect x="310" y="310" width="100%" height="100px" />
            </clipPath>
            <clipPath id="myImgRect">
                <rect width="97%" height="67%" rx="20" clip-path="url(#cut-off-bottom)"/>
            </clipPath>
            </clipPath>
            <clipPath id="mytxtRect">
                <rect width="97%" height="97%" rx="20" clip-path="url(#cut-off-top)"/>
            </clipPath>
        </defs>
        <rect width="97%" height="97%" style="fill: rgb(50,50,50);" rx="20" filter="url(#text-filter)"/>
        <g>
            <rect width="97%" height="97%" style="fill: rgb(255,255,255);" rx="20"/>
            <text class="book-title" x="5px" y="68%"> <?php echo $book->title ?> </text>
            <text class="book-desc" x="5" y="76%"> <?php
                $data = $book->description;
                if(strlen($data) > 132){
                    $data = substr($data,0,132) . '...';
                }
                $const_len = strlen($data);
                $prev_len = $const_len;
                $new_len = $prev_len;
                $diff = $new_len - $prev_len;
                for($i=1; $i<=intval($prev_len/34);$i++){
                    ($data = (substr($data,0,($i*34)-1+$diff)."<tspan x='5' dy='1.2em'>").substr($data,($i*34)-1+$diff))."</tspan>";
                    $temp = $prev_len;
                    $prev_len=$new_len;
                    $new_len = strlen($data);
                    $diff = $diff + $new_len - $prev_len;
                }

                echo $data;
                ?> </text>
        </g>

        <image xlink:href="<?php echo $book->image_url; ?>" clip-path="url(#myImgRect)"  "/>
        <rect onclick="location.href='/book_details/<?= $book->id ?>'" class="btn" width="97%" height="97%" rx="20"/>
    </svg>
    <svg onclick="fav('<?=$book->id?>')" class="heart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37.255" height="35.9" viewBox="0 0 37.255 35.9"><defs><style>.a{clip-path:url(#a);}.b{fill:white;stroke: gray;}</style><clipPath id="a"><path d="M0-47.5H37.255v35.9H0Z" transform="translate(0 47.5)"/></clipPath></defs><g transform="translate(0 47.5)"><g transform="translate(0 -47.5)"><g class="a"><g transform="translate(3.007 3.907)"><path class="b" id="<?=$book->id?>" d="M0-2.5c0-8.313,11.945-11.393,15.621-1.77C19.3-13.892,31.242-10.811,31.242-2.5c0,9.032-15.621,20.483-15.621,20.483S0,6.533,0-2.5" transform="translate(0 10.23)"/></g></g></g></g></svg>
</div>