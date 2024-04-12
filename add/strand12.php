<?php
include_once 'verti-header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
</head>
<style>
    .center{
        margin: auto;
    }
    select{
        margin: 10px;
    }
    body{
        margin-bottom: 40px;
    }
</style>
<body>

<br><br>
    <?php
    if(isset($_POST['stem'])) {
        echo "stem";
    }
    else if (isset($_POST['humss'])) {
        echo "humss";
    }
    else if (isset($_POST['abm'])) {
        echo "abm";
    }
    else if (isset($_POST['gas'])) {
        echo "gas";
    }
    else if (isset($_POST['css'])) {
        echo "css";
    }
    else if (isset($_POST['prog'])) {
        echo "
        <h1 class='title'>Subjects for ICT Programming</h1>
        <hr>
        <form action=''>
        <table class='center'>
            <td valign='top'>
            <table class='subject'>
            <tr>
            <td><h2>First Semester</h2></td>
            </tr>
            <tr style='text-align: left'>
                <td colspan='5'>
                    <b><p>Core Subjects</p></b>
                </td>
            </tr>
        
            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>None</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>None</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>None</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>
            
            </table>

            </td>
            <td valign='top'>
            <table class='subject'>
            <tr>
            <td><h2>First</h2></td>
            </tr>
            <tr style='text-align: left'>
                <td colspan='5'>
                    <b><p>Applied and Specialized Subjects</p></b>
                </td>
            </tr>
        
            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>
            
            </table>
            </td>
        </table>

        <table class='center'>
            <td valign='top'>
            <table class='subject'>
            <tr>
            <td><h2>Second Semester</h2></td>
            </tr>
            <tr style='text-align: left'>
                <td colspan='5'>
                    <b><p>Core Subjects</p></b>
                </td>
            </tr>
        
            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>None</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>None</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>None</option>
                        <option>Oral Communication</option>
                        <option>Read and Writing</option>
                        <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                        <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                        <option>21st Century Literature from the Philippines and the World</option>
                        <option>Contemporary Philippine Arts from the Region</option>
                        <option>Media and Information Literacy</option>
                        <option>General Mathematics</option>
                        <option>Statistics and Probability</option>
                        <option>Earth and Life Science</option>
                        <option>Physical Science</option>
                        <option>Personality Development</option>
                        <option>Understanding Culture, Society and Politics</option>
                        <option>Introduction to the Philosophy of the Human Person</option>
                        <option>Physical Education and Health 1</option>
                        <option>Physical Education and Health 2</option>
                        <option>Physical Education and Health 3</option>
                        <option>Physical Education and Health 4</option>
                    </select>
                </td>
            </tr>
            
            </table>

            </td>
            <td valign='top'>
            <table class='subject'>
            <tr>
            <td><h2>First</h2></td>
            </tr>
            <tr style='text-align: left'>
                <td colspan='5'>
                    <b><p>Applied and Specialized Subjects</p></b>
                </td>
            </tr>
        
            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <select name='' id=''>
                        <option value='' disabled selected>Subject</option>
                        <option>Empowerment Technologies for ICT</option>
                        <option>Computer Programming 1A (JAVA)</option>
                        <option>Computer Programming 1B (DSA)</option>
                        <option>Robotics 111</option>
                        <option>English for Academic and Professional Purposes</option>
                        <option>Practical Research 1</option>
                        <option>Object-Oriented Programming</option>
                        <option>Relational Database Management System</option>
                        <option>Robotics 112</option>
                        <option>Practical Research 2</option>
                        <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                        <option>Entrepreneurship</option>
                        <option>Computer Programming 2A (SAUD)</option>
                        <option>Computer Programming 2B (EEDP.Net)</option>
                        <option>Research Project</option>
                        <option>Computer Programming 2A (WP)</option>
                        <option>Computer Programming 2B (CSS)</option>
                        <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                    </select>
                </td>
            </tr>
            
            </table>
            </td>
        </table>
        
        </form>
        ";

    }
    else if (isset($_POST['ani'])) {
        echo "ani";
    }
    else if (isset($_POST['tour'])) {
        echo "tour";
    }
    else if (isset($_POST['cook'])) {
        echo "cook";
    }
    else if (isset($_POST['smaw'])) {
        echo "smaw";
    }
    else if (isset($_POST['auto'])) {
        echo "auto";
    }
    else{
        echo "none";
    }

?>
</body>
</html>