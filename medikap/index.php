                <?php 
                session_start();                
                if(isset($_GET['x']) && $_GET['x']=='home'){
                    $page = "home.php";
                    include "main.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='pemeriksaan'){
                    if($_SESSION['level_medikaapp']==1 || $_SESSION['level_medikaapp']==3) {
                    $page = "pemeriksaan.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }

                }elseif(isset($_GET['x']) && $_GET['x']=='user'){
                    if($_SESSION['level_medikaapp']==1){
                        $page = "user.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }

                }elseif(isset($_GET['x']) && $_GET['x']=='dokter'){
                    if($_SESSION['level_medikaapp']==1 || $_SESSION['level_medikaapp']==4) {
                    $page = "dokter.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }

                }elseif(isset($_GET['x']) && $_GET['x']=='report'){

                    if($_SESSION['level_medikaapp']==1){
                        $page = "report.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }


                }elseif(isset($_GET['x']) && $_GET['x']=='pasien'){
                    if($_SESSION['level_medikaapp']==1 || $_SESSION['level_medikapp']==3) {
                    $page = "pasien.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }

                }elseif(isset($_GET['x']) && $_GET['x']=='login'){
                    include "login.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='logout'){
                    include "proses/proses_logout.php";


                }elseif(isset($_GET['x']) && $_GET['x']=='katpasien'){
                    if($_SESSION['level_medikaapp']==1) {
                    $page = "katpasien.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }

                }elseif(isset($_GET['x']) && $_GET['x']=='pemeriksaanitem'){
                    if($_SESSION['level_medikaapp']==1 || $_SESSION['level_medikaapp']==3) {
                    $page = "pemeriksaanitem.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }

                }elseif(isset($_GET['x']) && $_GET['x']=='view_item'){
                    if($_SESSION['level_medikaapp']==1) {
                    $page = "view_item.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }

                }else{
                    $page = "home.php";
                    include "main.php";
                }
                ?>