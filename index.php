<?php
require_once "connect.php";
$connect = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connect->connect_errno!=0)
	{
		echo "Error: ";
	}
	else
	{
	    $query = 'SELECT * FROM Nauczyciele';
	    $result = mysqli_query($connect, $query);
	    
        $i = 0;

        while ($record = mysqli_fetch_assoc($result))
        {
            $id[$i]=$record['id_nauczyciela'];
            $imie[$i]=$record['imie'];
            $nazwisko[$i]=$record['nazwisko'];
            $stopien_naukowy[$i]=$record['stopien_naukowy'];
            $katedra[$i]=$record['katedra'];
            $zdjecie[$i]=$record['zdjecie'];
            
            $i = $i+1;
            
        }
        
        $result->free_result();
		$connect->close();
	}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacja - konsultacje</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>    
    <nav class="navbar">
        <div class="logo_container">
            <a href="index.php">
                <img src="images/ue_logo.png" class="logo" alt="">
            </a>
        </div>
        <div class="account_container">
            <a href="">
                <img src="images/person_circle.svg" class="img_account" alt="">
            </a>
        </div>
    </nav>

    <header class="header" id="header" style="height: 700px; transition: height 0.7s;">
        <div class="message_container">
            <h1 id="text1">Zapisz się na konsultacje!</h1>
        </div>
        <div class="input_container">
            <input type="text" class="search_input" placeholder="Znajdź swojego nauczyciela"/>
            <button class="button_search" id="sb">
                <img src="images/search_icon.svg" alt="">
            </button>
        </div>
    </header>

    <section class="title_container">
        <h2>Nauczyciele akademiccy</h2>
    </section>

    <main class="teachers">

    </main>

    <div class="message_container_2">
        <center><h4>Nie znaleziono podanego nauczyciela akademickiego...</h4></center>
    </div>

    <footer>
        <div class="second_logo_container">
            <img src="images/ue_logo2.jpg" alt="">
        </div>
        <div class="information_container">
            <h5>Uniwersytet Ekonomiczny w Katowicach</h5>
            <p>ul. 1 Maja 50, 40-287 Katowice</p>
            <p>tel. +48 32 257 70 00</p>
        </div>
        <div class="social_media_container">
            <h5>Odwiedź nasze profile</h5>
            <div class="social_media_imgs">
                <a href=""><img src="images/twitter.svg" alt=""></a>
                <a href=""><img src="images/facebook.svg" alt=""></a>
                <a href=""><img src="images/youtube.svg" alt=""></a>
                <a href=""><img src="images/instagram.svg" alt=""></a>
            </div>
        </div>
    </footer>

    <script>
        
        const test = document.querySelector('.message_container');
        const TEACHERS = document.querySelector('.teachers');
        const SEARCH_INPUT = document.querySelector('.search_input');
        const BUTTON_SEARCH = document.querySelector('.button_search');
        const MESSAGE_CONTAINER_2 = document.querySelector('.message_container_2');

        var ID = <?php echo json_encode($id);?>;
        var Imiona = <?php echo json_encode($imie);?>;
        var Nazwiska = <?php echo json_encode($nazwisko);?>;
        var Stopnie_naukowe = <?php echo json_encode($stopien_naukowy);?>;
        var Katedry = <?php echo json_encode($katedra);?>;
        var Zdjecia = <?php echo json_encode($zdjecie);?>;

        class Teacher {
            constructor(id, name, surname, degree, cathedral, img) {
                this.id = id;
                this.name = name;
                this.surname = surname;
                this.degree = degree;        
                this.cathedral = cathedral;
                this.img = img;
            }
        }

        class Teachers {
            constructor(){
                this.teachers = [];
            }

            newTeacher(id, name, surname, degree, cathedral, img) {
                let t = new Teacher(id, name, surname, degree, cathedral, img)
                this.teachers.push(t);
                return t;
            }

            getAllTeachers() {
                return this.teachers;
            }
        }

        function createObjectArray() {
            let teacher = new Teachers();

            for (let i = 0; i < Imiona.length; i++) {
                teacher.newTeacher( ID[i], Imiona[i], Nazwiska[i], Stopnie_naukowe[i], Katedry[i], Zdjecia[i]);
            }

            return teacher.getAllTeachers();
        }

    
        let array_teachers = createObjectArray();


        function displayAllTeachers() {
            let text = '';
            MESSAGE_CONTAINER_2.classList.remove('active');
            array_teachers.map((el) => {
                text += 
                    `<div class="teacher_container">
                        <div class="profile_img_container">
                            <img src='${el.img}' alt="">
                        </div>
                        <div class="description_container">
                            <h3>${el.degree} ${el.name} ${el.surname}</h3>
                            <p>Katedra ${el.cathedral}</p>
                        </div>
                        <div class="details_container">
                           <a href="podstrona.php?id=${el.id}"> <button class="deatils_btn">Sprawdź szczegóły</button></a>
                        </div>
                    </div>`    
            })
            TEACHERS.innerHTML = text;
        }


        function searchTeacher() {
            let text = '';
            let input = SEARCH_INPUT.value;
            let new_array_teachers;
            
            window.scrollTo({ top: 100, behavior: 'smooth' });
            document.getElementById("header").style.height = "250px";
        
            
            if (input === '') {
                TEACHERS.innerHTML = '';
                new_array_teachers = [];
                displayAllTeachers();
            }
            else {
                
          
                
                new_array_teachers = array_teachers.filter(function (el){
                    return el.name.toLowerCase().includes(input.toLowerCase()) || el.surname.toLowerCase().includes(input.toLowerCase()); 
                });


                if (new_array_teachers.length === 0) {
                    TEACHERS.innerHTML = '';
                    MESSAGE_CONTAINER_2.classList.add('active');
                }
                else {
                    MESSAGE_CONTAINER_2.classList.remove('active');
                    text = '';
                    new_array_teachers.map((el) => {
                        text += 
                            `<div class="teacher_container">
                                <div class="profile_img_container">
                                    <img src='${el.img}' alt="">
                                </div>
                                <div class="description_container">
                                    <h3>${el.degree} ${el.name} ${el.surname}</h3>
                                    <p>Katedra ${el.cathedral}</p>
                                </div>
                                <div class="details_container">
                                   <a href="podstrona.php?id=${el.id}"> <button class="deatils_btn">Sprawdź szczegóły</button> </a>
                                </div>
                            </div>`    
                    })

                TEACHERS.innerHTML = text;
                }
            }
        }

        displayAllTeachers();

        SEARCH_INPUT.addEventListener('keypress', (e) => {
            if(e.key === "Enter") {
                searchTeacher();
            }
        });

        BUTTON_SEARCH.addEventListener('click', searchTeacher);
    
    
    </script>

</body>
</html>

