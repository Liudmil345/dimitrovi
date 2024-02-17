<?php 

    if(isset($_POST['submit'])) {
    
        $sender = $_POST['sender'];
        $email = $_POST['email'];
        // $photo_path	 = $_FILES['photo_path'];
        $person = $_POST['person']; 
        $father = $_POST['father']; 
        $mother = $_POST['mother']; 
        $dob = $_POST['dob']; 
        $city = $_POST['city']; 
        $profession = $_POST['profession']; 
        $husband = $_POST['husband']; 
        $husband_prof = $_POST['husband_prof']; 
        $children = $_POST['children']; 
        $message_ch = $_POST['message_ch']; 
        
        $connection = mysqli_connect('sql11.freesqldatabase.com', 'sql11684550', 'bPY7S1ybHv', 'sql11684550');
            
        if($connection) {
           echo "We are connected. <br>";
        } else {
            die("Database connection failed");
        }

        // Insert data from form into database 
        $query = "INSERT INTO sent_data (sender, email, person, father, mother, dob, city, profession, husband, husband_prof, children, message_ch) VALUES ('$sender', '$email', '$person', '$father', '$mother', '$dob', '$city', '$profession', '$husband', '$husband_prof', '$children', '$message_ch')"; 
    
        $result = mysqli_query($connection, $query); 
    
        if(!$result) {
            die('Query failed'.mysqli_error($connection));
        } else {
            echo "Data sent. <br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css">
    <title>Изпращане на материали</title>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-sm-8 mx-auto">
                <h1 class="text-center">Изпращане на материали</h1>
                <form action="send_data_liudmil.php" method="post" class="was-validated">
                    <div class="row mb-1">
                        <div class="form-group col-md-6">
                            <label for="sender">Изпращач</label>
                            <input type="text" name="sender" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="email">Електронна поща</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    
                    <div class="custom-file mb-3">
                        <input type="file" accept="image/*" class="custom-file-input" id="photo_path" name="photo_path">
                        <label class="custom-file-label" for="photo_path">Изберете снимка...</label>
                        <small id="photo_path" class="form-text text-danger">Възможно е само качването на снимки.</small>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="person">Имена на лицето</label>
                            <input type="text" name="person" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dob">Дата на раждане</label>
                            <input type="text" name="dob" id="dob" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="father">Баща на лицето</label>
                            <input type="text" name="father" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mother">Майка на лицето</label>
                            <input type="text" name="mother" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="city">Град на раждане</label>
                            <input type="text" name="city" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="profession">Професия на лицето</label>
                            <input type="text" name="profession" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="husband">Съпруг/а</label>
                            <input type="text" name="husband" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="husband_prof">Професия на съпруга/та</label>
                            <input type="text" name="husband_prof" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="children">Имена на децата</label>
                            <input type="text" name="children" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="message_ch">Данни за децата</label>
                            <input type="text" name="message_ch" class="form-control">
                        </div>
                    </div>
                    
                    <input class="btn btn-primary" type="submit" name="submit" value="Изпрати">
                </form>
            </div>

            <div class="col-sm-8 mx-auto">
                <h1 class="text-center">Изпратени данни</h1>
                <!-- 
                <p>[Чуждестранни съкращения в базата данни: id = идентификационен номер, sender = изпращач, email = електронна поща, person = имена на лицето, father = баща на лицето, mother = майка на лицето, dob = дата на раждане, city = град на раждане, profession = професия, husband = съпруг/а, husband_prof = професия на съпруга/та, children = деца, message_ch = данни за децата]</p>
                -->
                
                <div class="row my-5 border">
                    <div class="col-sm-11 mx-auto">
                        <?php 
                            $connection = mysqli_connect('sql11.freesqldatabase.com', 'sql11684550', 'bPY7S1ybHv', 'sql11684550');
            
                            if($connection) {
                                echo "We are connected. <br>";
                            } else {
                                die("Database connection failed");
                            }

                            $query = "SELECT * FROM sent_data"; 

                            $result = mysqli_query($connection, $query); 
                    
                            if(!$result) {
                                die('Query failed'.mysqli_error($connection));
                            } else {
                                echo "Data shown. <br>";
                            }

                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="id" class="badge badge-danger">Запис №: </label>
                                    <?php echo $row['id']; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="sender" class="badge badge-primary">Изпращач: </label>
                                    <?php echo $row['sender']; ?>
                                </div>
                        
                                <div class="form-group col-md-6">
                                    <label for="email" class="badge badge-primary">Електронна поща: </label>
                                    <?php echo "скрито"; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="person" class="badge badge-primary">Имена на лицето: </label>
                                    <?php echo $row['person']; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="dob" class="badge badge-primary">Дата на раждане: </label>
                                    <?php echo $row['dob']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="father" class="badge badge-primary">Баща на лицето: </label>
                                    <?php echo $row['father']; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mother" class="badge badge-primary">Майка на лицето: </label>
                                    <?php echo $row['mother']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="city" class="badge badge-primary">Град на раждане: </label>
                                    <?php echo $row['city']; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="profession" class="badge badge-primary">Професия на лицето: </label>
                                    <?php echo $row['profession']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="husband" class="badge badge-primary">Съпруг/а: </label>
                                    <?php echo $row['husband']; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="husband_prof" class="badge badge-primary">Професия на съпруга/та: </label>
                                    <?php echo $row['husband_prof']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="children" class="badge badge-primary">Имена на децата: </label>
                                    <?php echo $row['children']; ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="message_ch" class="badge badge-primary">Данни за децата: </label>
                                    <?php echo $row['message_ch']; ?>
                                </div>
                            </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dob" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                dateFormat: "yy-mm-dd"
                });
        });
    </script>
</body>
</html>