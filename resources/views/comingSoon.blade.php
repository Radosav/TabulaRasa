<!DOCTYPE html>
<html>
    <head>
        <title>Tabula Rasa</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                padding: 20px 10% 0px;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .title a {
                color: #000;
                text-decoration: none;
            }

            .desc {
                font-size: 32px;
            }

            .timer {
                margin-bottom: 40px;
            }

            .countdown {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><a href="https://www.facebook.com/Tabula-Rasa-234512806881506/">Tabula Rasa</a></div>
                <div class="desc timer">
                    Coming in 
                        <span class="countdown"><?php echo floor((mktime(0,0,0,03,26,2016) - time())/ 86400); ?></span > 
                    days
                </div>
                <div class="desc">
                    TabulaRasa aims to assist teachers in making lectures easier, faster and simpler so that students can learn more efficiently over the internet.
                </div>
            </div>
        </div>
    </body>
</html>
