<?php

/**
 * This is to seed dummy data into level_up database.
 * First, please edit some typos in the tables as follows:
 * m_course_categories => column 2 => 'category'
 * m_course => column 8 => 'course'
 * m_course => column 10 => 'category'
 * Then, run this script.
 */

echo "SEEDING STUFF";

class DBConnect{
    private $hostname = "localhost";
    private $port = 3306;
    private $dbname = "level_up";
    private $username = "root";
    private $password = "";

    public function connect(){
        //connection
        $pdo = new PDO("mysql:host=$this->hostname;port=$this->port;dbname=$this->dbname",$this->username, $this->password);
        //set error reply
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}

class LoremIpsum{
    public static $sentenceArr = [
        'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, excepturi!',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptatem incidunt unde laboriosam harum placeat.',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident consectetur fugit labore necessitatibus rerum. Rerum recusandae ea a consectetur architecto!',
        'Accusamus vero recusandae perspiciatis distinctio impedit quae quas tempore sequi deserunt, in molestias corrupti repudiandae et vitae doloremque, labore rerum facere a dignissimos temporibus error voluptate',
        'Laudantium sed incidunt velit itaque accusantium sequi neque consequatur aliquam inventore unde magni quidem consectetur doloribus officia amet labore, distinctio animi in suscipit at.',
        'Veritatis, aliquam voluptates provident, illum ex doloremque eligendi error optio, fugit mollitia accusantium non. Accusamus vero recusandae perspiciatis distinctio impedit quae quas tempore sequi deserunt, in molestias corrupti repudiandae et vitae doloremque.'
    ];

    public static $longSenArr = [
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi facilis id itaque nulla veniam suscipit unde velit dignissimos doloremque laborum blanditiis consequatur laudantium esse molestias culpa consectetur, eos architecto? Veritatis, aliquam voluptates provident, illum ex doloremque eligendi error optio, fugit mollitia accusantium non. Accusamus vero recusandae perspiciatis distinctio impedit quae quas tempore sequi deserunt, in molestias corrupti repudiandae et vitae doloremque, labore rerum facere a dignissimos temporibus error voluptate maxime ipsa ipsum? Soluta corrupti rerum possimus. Laudantium sed incidunt velit itaque accusantium sequi neque consequatur aliquam inventore unde magni quidem consectetur doloribus officia amet labore, distinctio animi in suscipit at.',
        'Iure, quas ipsum. Voluptate, maxime cupiditate enim ratione adipisci id veniam porro dignissimos obcaecati illo consectetur recusandae! Hic officiis cupiditate temporibus enim obcaecati? Laboriosam libero eum, quibusdam ea nihil cum reprehenderit animi deleniti iusto ut architecto doloribus eos dignissimos expedita nobis commodi quidem aspernatur ullam ratione. Necessitatibus doloremque consectetur maiores. Incidunt ratione obcaecati voluptatum at expedita illo, dolores quod ullam asperiores adipisci perferendis error voluptatibus qui temporibus?',
        'Animi blanditiis sunt totam, id sapiente illum officia repudiandae ea eum rem praesentium beatae quis nisi, molestias veniam incidunt magnam repellat. Molestiae fuga libero, neque et, perferendis dolores at sapiente voluptas hic reiciendis eaque corporis inventore eos tenetur quibusdam cum facere iste quis odit quae nulla rerum. Reprehenderit laborum optio quis officia dignissimos necessitatibus nihil. Cupiditate doloribus deserunt omnis a hic dolorum aut nisi, dignissimos earum dolor eos pariatur eveniet maxime illo eligendi soluta ducimus, placeat tempore illum impedit itaque. Praesentium, officia. Minus obcaecati iste laudantium debitis necessitatibus libero quia totam, consectetur, itaque officiis nam quas ex ipsum eos commodi alias excepturi reiciendis incidunt possimus dolorem.',
        'Amet, at debitis aliquam cum distinctio veritatis animi ipsum corporis quidem quae autem a! Consequatur, soluta praesentium! Similique in modi, saepe sapiente totam labore rerum? Veritatis dolor cumque debitis nihil dolores iure laborum nesciunt autem expedita necessitatibus a maxime sed fugiat molestias assumenda ex, cum tempore fuga ab inventore totam! Obcaecati doloribus officia sequi tempora eveniet quam accusantium illum provident ducimus tenetur similique voluptatem sint rerum dignissimos magnam saepe, voluptate maxime.',
        'Ullam aut nobis dolorum dolor voluptatem tempora eligendi in impedit officia molestiae eum architecto nemo, quaerat iure expedita quis. Quia quae quisquam quaerat in perferendis nam facere fugiat, dolorum perspiciatis ad laboriosam, rem error assumenda voluptatibus voluptate ratione consequuntur ut, beatae consectetur nesciunt. Impedit, obcaecati minima, culpa ullam facere ex autem perferendis reiciendis cupiditate in eaque non neque quas cum facilis? Dolor eius culpa natus impedit nobis neque rerum veniam? Dicta, voluptatem quam! Odio alias amet sequi deserunt commodi eveniet optio, molestias magnam odit molestiae esse. Quas laborum cum, corrupti, voluptas necessitatibus maiores dolorem repellat facilis.',
        'Exercitationem veniam officia dolore possimus saepe et natus sunt ut dolorem doloremque? Molestias, error explicabo deleniti iusto omnis dolor laborum enim voluptates libero harum nemo quaerat ipsa minus, ab magnam neque animi dolorem quam aperiam. Id aut cum, amet distinctio velit, dolorum exercitationem cupiditate vero delectus excepturi ipsam reprehenderit corrupti tenetur quasi sed! Culpa architecto laborum nobis! Facere non impedit ipsa nulla voluptatum amet! Explicabo quas praesentium tempore fuga esse, error deleniti. Soluta cum culpa obcaecati tempora dolor. Minus veniam odio nihil perferendis, nesciunt consequatur tempora nisi a distinctio deleniti cupiditate magni eius atque rerum fugit tempore harum velit unde beatae nostrum enim? Sit explicabo aperiam sint amet commodi quam, maiores, facilis, dignissimos vero eius dolore nam soluta?'
    ];

    public static $wordArr = [
        'Aet Consectetur',
        'Dolorem Maxime Iure',
        'Architecto',
        'Pariatur',
        'Accusamus Hic Nisi',
        'Harum Eligendi',
        'Fugit Mollitia',
        'Voluptates Brovident',
        'Veritatis ex Aliquam',
        'Aolestias Xorrupti',
        'Coloremque',
        'Eepudiandae',
        'Roloremque Eligendi',
        'Un Kolestias',
        'Necessitatibus',
        'Perspiciatis',
        'Bnde Nagni Suidem',
        'Pero Recusandae',
        'Consectetur Doloribus',
        'Adipisicing'
    ];

    public static $videoArr = [
        'https://www.youtube.com/watch?v=_vWlu5IWWys',
        'https://www.youtube.com/watch?v=DJs8P30Nb9E&list=RDeF92-uSiVZQ&index=3',
        'https://www.youtube.com/watch?v=FOwFnBar4bk&list=RDeF92-uSiVZQ&index=2',
        'https://vimeo.com/727330069',
        'https://vimeo.com/730181516',
        'https://vimeo.com/729475176'
    ];

    public static $nameArr = [
        'Sahra Hough',
        'Mohammad Whitworth',
        'Tea Gallagher',
        'Ella-Rose Chase',
        'Eleasha Dyer',
        'Naveed Holcomb',
        'Keeva Griffith',
        'Kien Small',
        'Ilyas Sawyer',
        'Kallum Hope',
        'Portia Wickens',
        'Gail Stubbs',
        'Aariz Dunn',
        'Matilda King',
        'Lorraine Hanna',
        'Elisha Mohamed',
        'Aleena Roth',
        'Debbie Mcneil',
        'Rhiannon Woods',
        'Vanesa Cousins'
    ];

    public static $images = [
        'profile_local' => './resources/img/profile.jpg',
        'profile_web' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6zes53m4a_2VLTcmTn_bHk8NO5SkuWfcQbg&usqp=CAU',
        'cover_local' => './resources/img/cover.jpg',
        'cover_web' => 'https://www.incimages.com/uploaded_files/image/1920x1080/getty_509107562_2000133320009280346_351827.jpg',
        'other_local' => './resources/img/other.jpg',
        'other_web' => 'https://media.sproutsocial.com/uploads/2018/04/Facebook-Cover-Photo-Size.png',

    ];

    public static $emailArr = [
        'private17@fuadd.me',
        'pstar419@igtook.org',
        'fedinakseniya@leg10.xyz',
        'kashif4u86@gmailvn.net',
        'kletzsch@getmail.lt',
        'juckigor@nakiuha.com',
        'babank@gmailer.site',
        'akhuss@domainmail.cf',
        'kennyson@uhpanel.com',
        'gorniigigant@adheaminn.xyz',
        'haze123@cardkurd.com',
    ];

    public static $phoneArr = [
        '681-399-8386',
        '530-361-1189',
        '843-505-2091',
        '714-646-8262',
        '718-614-7558',
        '443-853-7239',
        '973-930-2331',
        '919-222-8075',
        '201-375-2476',
        '845-543-0207',
        '907-233-2596'
    ];

    public static $addressArr = [
        '47 St Margarets Drive
        North Canton, OH 44720',
        '8853 Selby St.
        Randallstown, MD 21133',
        '7470 4th St.
        Winter Haven, FL 33880',
        '23 Harvard Circle
        Parsippany, NJ 07054',
        '90 Lafayette Lane
        Garden City, NY 11530',
        '8840 Elm Rd.
        Royersford, PA 19468',
    ];

    public static $categoryArr = [
        'Web Development',
        'English',
        'Japanese Grammar',
        'Painting',
        'Driving',
        'Art and Culture'
    ];

}


function sql_builder($table, $col_arr){

    $columns = '';
    $preps = '';

    foreach($col_arr as $key => $value){
        $columns .= substr($key, 1) . ',';
        $preps .= $key . ',';
    }

    $preps = substr($preps, 0, -1); # Removing the trailing comma.
    $columns = substr($columns, 0, -1);

    $sql = "INSERT INTO $table ($columns) VALUES ($preps)";

    return $sql;
}

function seed_m_instructors($count){
    try{

        $pdo = (new DBConnect())->connect();
        $params = [
            ':full_name' => LoremIpsum::$nameArr[rand(0,19)], 
            ':profile_image' => LoremIpsum::$images['profile_local'],    
            ':job_position' => LoremIpsum::$wordArr[rand(0,19)], 
            ':bio' => LoremIpsum::$sentenceArr[rand(0,5)], 
            ':email' => LoremIpsum::$emailArr[rand(0,10)], 
            ':phone' => LoremIpsum::$phoneArr[rand(0,10)],
            ':address' => LoremIpsum::$addressArr[rand(0,5)]
        ];
        
        //Insert the data
        $sql = sql_builder('m_instructors', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
            ':full_name' => LoremIpsum::$nameArr[rand(0,19)], 
            ':profile_image' => LoremIpsum::$images['profile_local'],    
            ':job_position' => LoremIpsum::$wordArr[rand(0,19)], 
            ':bio' => LoremIpsum::$sentenceArr[rand(0,5)], 
            ':email' => LoremIpsum::$emailArr[rand(0,10)], 
            ':phone' => LoremIpsum::$phoneArr[rand(0,10)],
            ':address' => LoremIpsum::$addressArr[rand(0,5)]
        ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_m_course_categories($count){
    try{

        $pdo = (new DBConnect())->connect();
        $params = [
            ':category_name' => LoremIpsum::$categoryArr[rand(0,19)], 
            ':is_deleted' => 0
        ];
        
        //Insert the data
        $sql = sql_builder('m_course_categories', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':category_name' => LoremIpsum::$categoryArr[rand(0,5)], 
                ':is_deleted' => 0
            ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_m_course_levels($levelArr){

    try{

        $pdo = (new DBConnect())->connect();
        $count = count($levelArr);
        
        //Insert the data
        $sql = 'INSERT into m_course_levels (level_name) VALUES (:level_name)';

        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':level_name' => $levelArr[$i]
            ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_m_courses ($count) {
    try{

        $pdo = (new DBConnect())->connect();
    
        //Insert the data
        $sql = 'INSERT INTO m_courses (instructor_id, course_title, course_info, course_description, course_target, price, course_cover_image, promo_percent, category_id, level_id, duration, is_deleted)
        VALUES (:instructor_id, :course_title, :course_info, :course_description,:course_target, :price, :course_cover_image, :promo_percent, :category_id, :level_id, :duration, :is_deleted)';
        $stmt = $pdo->prepare($sql);
    
        for ($i=0; $i < $count; $i++) {
            $stmt->execute(
                [
                    ':instructor_id' => rand(1,5), 
                    ':course_title' => LoremIpsum::$wordArr[rand(0,19)],    
                    ':course_info' => LoremIpsum::$sentenceArr[rand(0,5)], 
                    ':course_description' => LoremIpsum::$sentenceArr[rand(0,5)], 
                    ':course_target' => LoremIpsum::$sentenceArr[rand(0,5)], 
                    ':price' => rand(10000,100000), 
                    ':course_cover_image' => './resources/img/cover_1.jpg', 
                    ':promo_percent' => rand(0,50), 
                    ':category_id' => rand(1,5),
                    ':level_id' => rand(1,5),
                    ':duration' => rand(30,150),
                    ':is_deleted' => 0
    
                ]
            );
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_t_chapters ($count) {
    try{
        $pdo = (new DBConnect())->connect();
    
        //Insert the data
        $sql = 'INSERT INTO t_chapters (course_id, chapter_title)
        VALUES (:course_id, :chapter_title)';
        $stmt = $pdo->prepare($sql);
    
        for ($i=0; $i < $count; $i++) {
            $stmt->execute(
                [
                    ':course_id' => rand(1,5), 
                    ':chapter_title' => LoremIpsum::$wordArr[rand(0,19)]
                ]
            );
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_t_lectures ($count) {
    try{
        $pdo = (new DBConnect())->connect();
    
        //Insert the data
        $sql = 'INSERT INTO t_lectures (chapter_id, lecture_title, video_url, lecture_description, lecture_script)
        VALUES (:chapter_id, :lecture_title, :video_url, :lecture_description, :lecture_script)';
        $stmt = $pdo->prepare($sql);
    
        for ($i=0; $i < $count; $i++) {
            $stmt->execute(
                [
                    ':chapter_id' => rand(1,6), 
                    ':lecture_title' => LoremIpsum::$wordArr[rand(0,19)],
                    ':video_url' => LoremIpsum::$videoArr[rand(0,5)],
                    ':lecture_description' => LoremIpsum::$sentenceArr[rand(0,5)],
                    ':lecture_script' => LoremIpsum::$sentenceArr[rand(0,5)],
                ]
            );
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_t_quizs($count) {
    try{
        $pdo = (new DBConnect())->connect();
        $params = [
            ':lecture_id' =>rand(0,19), 
            ':question' => LoremIpsum::$sentenceArr[rand(0,5)],    
            ':answer1' => LoremIpsum::$wordArr[rand(0,2)], 
            ':answer2' => LoremIpsum::$wordArr[rand(0,2)], 
            ':answer3' => LoremIpsum::$wordArr[rand(0,2)], 
            ':correct_answer' => LoremIpsum::$wordArr[rand(0,2)], 
        ];
        
        //Insert the data
        $sql = sql_builder('t_quizs', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':lecture_id' =>rand(0,19), 
                ':question' => LoremIpsum::$sentenceArr[rand(0,5)],    
                ':answer1' => LoremIpsum::$wordArr[rand(0,2)], 
                ':answer2' => LoremIpsum::$wordArr[rand(0,2)], 
                ':answer3' => LoremIpsum::$wordArr[rand(0,2)], 
                ':correct_answer' => LoremIpsum::$wordArr[rand(0,2)],
            ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_m_instructor_experiences($count) {
    try{
        $pdo = (new DBConnect())->connect();
        $params = [
            ':instructor_id' =>rand(1,6), 
            ':exp_title' => LoremIpsum::$wordArr[rand(0,10)],    
            ':exp_type' => LoremIpsum::$wordArr[rand(11,20)], 
            ':exp_start_date' => '2022-07-18', 
            ':exp_end_date' => '2022-08-18'
        ];
        
        //Insert the data
        $sql = sql_builder('m_instructor_experiences', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':instructor_id' =>rand(1,6), 
                ':exp_title' => LoremIpsum::$wordArr[rand(0,10)],    
                ':exp_type' => LoremIpsum::$wordArr[rand(11,19)], 
                ':exp_start_date' => '2022-07-18', 
                ':exp_end_date' => '2022-08-18'
            ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_m_students ($count) {
    try{
        $pdo = (new DBConnect())->connect();
        $params = [
            ':full_name' => LoremIpsum::$nameArr[rand(0,19)], 
            ':email' => LoremIpsum::$emailArr[rand(0,10)], 
        ];
        
        //Insert the data
        $sql = sql_builder('m_students', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':full_name' => LoremIpsum::$nameArr[rand(0,19)], 
                ':email' => LoremIpsum::$emailArr[rand(0,10)], 
            ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_t_course_review_rates ($count) {
    try{
        $pdo = (new DBConnect())->connect();
        $params = [
            ':course_id' => rand(1,10), 
            ':student_id' => rand(1,10), 
            ':rating' => rand(1,5), 
            ':review' => LoremIpsum::$sentenceArr[rand(0,5)], 
        ];
        
        //Insert the data
        $sql = sql_builder('t_course_review_rates', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':course_id' => rand(1,10), 
                ':student_id' => rand(1,10), 
                ':rating' => rand(1,5), 
                ':review' => LoremIpsum::$sentenceArr[rand(0,5)], 
            ]);
        }
    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

function seed_t_order_list ($count) {
    try{
        $pdo = (new DBConnect())->connect();
        $params = [
            ':student_id' => rand(1,9), 
            ':course_id' => rand(1,9), 
            ':order_price' => rand(1000,50000), 
        ];
        
        //Insert the data
        $sql = sql_builder('t_order_list', $params);
        echo $sql;
        $stmt = $pdo->prepare($sql);
        for ($i=0; $i < $count; $i++) {
            $stmt->execute([
                ':student_id' => rand(1,9), 
                ':course_id' => rand(1,9), 
                ':order_price' => rand(1000,50000), 
            ]);
        }

        fill_instructor_ids ();

    } catch(Exception $e){
        echo '<pre>';print_r($e);echo '</pre>';exit;
    }
}

#Helper
function fill_instructor_ids () {
    // Was coding this on half past midnight, so logic might have been crappy, smh.

    $pdo = (new DBConnect())->connect();
    $stmt = $pdo -> prepare (
        "SELECT course_id FROM t_order_list"
    );
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($courses as $course){
        $course_id = $course['course_id'];

        $stmt = $pdo->prepare(
            "SELECT instructor_id FROM m_courses WHERE id = $course_id"
        );
        $stmt->execute();
        $id = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instructor_id = $id[0]['instructor_id'];

        $stmt = $pdo->prepare(
            "UPDATE t_order_list SET instructor_id = $instructor_id WHERE course_id = $course_id"
        );
        $stmt->execute();
    }
}


// seed_m_instructors(6);
// seed_m_course_categories(6);
// seed_m_course_levels([
//     'Beginner',
//     'Basic',
//     'Intermediate',
//     'Upper Intermediate',
//     'Advanced',
//     'Proficient'
// ]);
// seed_m_courses(10);
// seed_t_chapters(6);
// seed_t_lectures(20);
// seed_t_quizs(30);
// seed m_instructor_experiences(30);
// seed_m_students(10);
// seed_t_course_review_rates(30);
// seed_t_order_list(30);

echo "SEEDED SUCCESSFULLY.";



?>