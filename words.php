<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0 ;
if(!$_user_id){
    header("Location: index.php");
    die();
}

require_once('functionHead.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>words</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    
    
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link rel="stylesheet" href="style2.css" />
</head>
<body>
    <div class="container">

        <div class="header">
            <h1 class="maintitle">
                <img src="dictionary.png" alt="" > My Vocabularies
            </h1>
        </div>
        <!-- ----------------------------------------------- -->
        <div class="sidebar">
            <h4>Menu</h4>
            <ul class="menu">
                <li><a href="words.php" class="menu-item" data-target="words"> All Words</a></li>
                <li><a href="#" class="menu-item" data-target="wordform"> Add New Words</a></li>
                <li><a href="logout.php"> Logout</a></li>
            </ul>
        </div>
        <!-- --------------------------------------------------------- -->
        <div class="content">
            
            <div class="wordbox helement" id="words">
                <div class="option">
                      <select name="" id="alphabets">
                        <option value="All">All Words</option>
                        <option value="A">A#</option>
                        <option value="B">B#</option>
                        <option value="B">C#</option>

                      </select>
                </div>
                <!-- =============================================== -->
                    <div class="search">
                        
                        <form action="" method="POST">
                        <input type="text" name="search" placeholder="Search Your Words" id="search" name="search" class="search-box">
                        <button class="float-right" name="submit" value="submit">Search</button>
                        </form>

                    </div>
                <!-- ========================================== -->
                    <div class="main-table" >
                        <table class="words">
                            <thead>
                                <tr>
                                    <th width="20%">Words</th>
                                    <th>Definition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['submit'])){
                                    $searchText = $_POST['search'];
                                    $words = getWords($_user_id, $searchText);
                                }
                                else{
                                    $words = getWords($_user_id);
                                }
                                // ---------------------------------------
                                if(count($words)>0){
                                    $length = count($words);
                                    for($i=0; $i<$length; $i++){
                                        ?>
                                            <tr>
                                                <td><?php echo $words[$i]['word'];  ?></td>
                                                <td><?php echo $words[$i]['meaning'];  ?></td>
                                                <td><a class="delete myButton"   href="delete.php?id=<?php echo $words[$i]['id']; ?>">Delete</a></td>

                                            </tr>
                                        <?php
                                    }
                                }
                                // ---------------------------------------

                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>


                <!-- add new words -->
                <div class="formc helement" id="wordform" style="display:none;" >
                            
                            <form action="task.php" method="POST" class="add-word">
                            <h2>Add New Word</h2>
                                <fieldset>
                                    <label for="word">Word</label>
                                    <input type="text" name="word" placeholder="Word" id="word">
                                    <label for="Meaning">Meaning</label>
                                    <textarea name="meaning" id="meaning" cols="30" rows="10"></textarea>
                                    
                                    <input type="hidden" name="action" value="addword">
                                    <input type="submit" class="button-primary" value="add Words">
                                </fieldset>
                            </form>
                </div>
                     <!-- new words -->
                    
              
        </div>  
        <!-- --------------------------------------------- -->
        
    </div>

    
    




    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script>
    ;(function($){
        $(document).ready(function(){
            // alert("HELLO");
            $('.menu-item').on('click',function(){
                $(".helement").hide();
                var target = "#"+$(this).data("target");
                $(target).show();
            });

        $("#alphabets").on('change',function(){
            var char = $(this).val().toLowerCase();
            
            if('all' == char){
                $(".words tr").show();
                return true;
            }
            $(".words tr:gt(0)").hide();

            $(".words td").filter(function(){
                return $(this).text().indexOf(char) == 0;
            }).parent().show();
        });

        });
    })(jQuery);

</script>
</body>
</html>








