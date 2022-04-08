<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="booklist.css">
</head>
<body>
<div>
    <?php foreach ($books as $book): ?>
        <div class="boxes" style="padding: 15px">
            <svg width="210px" height="310px" style="border-radius: 20px;">
                <defs>
                    <filter id="text-filter" x="0" y="0" width="110%" height="110%">
                        <feOffset result="offOut" in="SourceGraphic" dx="2" dy="2" />
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

                <image xlink:href="<?php echo $book->imageUrl; ?>" clip-path="url(#myImgRect)"/>
                <rect class="btn" width="97%" height="97%" rx="20"/>
            </svg>
        </div>
    <?php endforeach;?>
</div>
<div>

</div>

</body>
</html>
