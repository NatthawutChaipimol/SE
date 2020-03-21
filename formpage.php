<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Form Using HTML, CSS And PHP - reusable form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="form.js"></script>
</head>

<body>
    <div class="container">
        <div class="imagebg"></div>
        <div class="row " style="margin-top: 50px; ">
            <div class="col-md-6 col-md-offset-3 form-container">
                <h2 style="padding-top: 20px; ">เพิ่มรีวิวสินค้า</h2>
                <form role="form" method="post" id="reused_form">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>ให้คะแนนสินค้าชินนี้</label>
                            <p>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="comments"> ความคิดเห็นเพิ่มเติม</label>
                            <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="แสดงความคิดเห็นตรงนี้" maxlength="6000" rows="7"></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-warning btn-lg btn-block">ส่ง </button>
                        </div>
                    </div>
                </form>
                <div id="success_message" style="width:100%; height:100%; display:none; ">
                    <h3>Posted your feedback successfully!</h3>
                </div>
                <div id="error_message" style="width:100%; height:100%; display:none; ">
                    <h3>Error</h3> Sorry there was an error sending your form.
                </div>
            </div>
        </div>
    </div>
</body>

</html>