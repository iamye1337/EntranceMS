<?php
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DB_NAME = "entrancems"; // Database name-> entrancems

try {
    $con = new PDO("mysql:host=$HOST;dbname=$DB_NAME", $USERNAME, $PASSWORD);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">

    <!-- Google font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Questions View Page</title>
</head>
<style>
   body{
    font-family: "Poppins", sans-serif;
  }
   sup {
        color: red;
    }
</style>

<body>
    <!-- navbar  -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../images/adarshaLogo.png" alt="Logo" width="30" height="auto" class="d-inline-block align-text-top">
                Adarsha Saula Yubak Secondary School
            </a>
        </div>
    </nav>

<<<<<<< HEAD
    <main class="m-4">
        <div class="mb-4">
            <!-- Back to Teacher Homepage -->
            <a href="teacher_panel.php" class="btn btn-success">Back to Home</a>
=======
    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Container -------------------------->

        <div class="row box-container box-area">

            <!-------------------------- (form) ---------------------------->
            <table id="questions" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Question ID</th>
                        <th>Question</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Date Added</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011-04-25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011-07-25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009-01-12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012-03-29</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008-11-28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012-12-02</td>
                        <td>$372,000</td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012-08-06</td>
                        <td>$137,500</td>
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>2010-10-14</td>
                        <td>$327,900</td>
                    </tr>
                    <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009-09-15</td>
                        <td>$205,500</td>
                    </tr>
                    <tr>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>23</td>
                        <td>2008-12-13</td>
                        <td>$103,600</td>
                    </tr>
                    <tr>
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>30</td>
                        <td>2008-12-19</td>
                        <td>$90,560</td>
                    </tr>
                    <tr>
                        <td>Quinn Flynn</td>
                        <td>Support Lead</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2013-03-03</td>
                        <td>$342,000</td>
                    </tr>
                    <tr>
                        <td>Charde Marshall</td>
                        <td>Regional Director</td>
                        <td>San Francisco</td>
                        <td>36</td>
                        <td>2008-10-16</td>
                        <td>$470,600</td>
                    </tr>
                    <tr>
                        <td>Haley Kennedy</td>
                        <td>Senior Marketing Designer</td>
                        <td>London</td>
                        <td>43</td>
                        <td>2012-12-18</td>
                        <td>$313,500</td>
                    </tr>
                    <tr>
                        <td>Tatyana Fitzpatrick</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>19</td>
                        <td>2010-03-17</td>
                        <td>$385,750</td>
                    </tr>
                    <tr>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>London</td>
                        <td>66</td>
                        <td>2012-11-27</td>
                        <td>$198,500</td>
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>New York</td>
                        <td>64</td>
                        <td>2010-06-09</td>
                        <td>$725,000</td>
                    </tr>
                    <tr>
                        <td>Gloria Little</td>
                        <td>Systems Administrator</td>
                        <td>New York</td>
                        <td>59</td>
                        <td>2009-04-10</td>
                        <td>$237,500</td>
                    </tr>
                    <tr>
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>41</td>
                        <td>2012-10-13</td>
                        <td>$132,000</td>
                    </tr>
                    <tr>
                        <td>Dai Rios</td>
                        <td>Personnel Lead</td>
                        <td>Edinburgh</td>
                        <td>35</td>
                        <td>2012-09-26</td>
                        <td>$217,500</td>
                    </tr>
                    <tr>
                        <td>Jenette Caldwell</td>
                        <td>Development Lead</td>
                        <td>New York</td>
                        <td>30</td>
                        <td>2011-09-03</td>
                        <td>$345,000</td>
                    </tr>
                    <tr>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                        <td>New York</td>
                        <td>40</td>
                        <td>2009-06-25</td>
                        <td>$675,000</td>
                    </tr>
                    <tr>
                        <td>Caesar Vance</td>
                        <td>Pre-Sales Support</td>
                        <td>New York</td>
                        <td>21</td>
                        <td>2011-12-12</td>
                        <td>$106,450</td>
                    </tr>
                    <tr>
                        <td>Doris Wilder</td>
                        <td>Sales Assistant</td>
                        <td>Sydney</td>
                        <td>23</td>
                        <td>2010-09-20</td>
                        <td>$85,600</td>
                    </tr>
                    <tr>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2009-10-09</td>
                        <td>$1,200,000</td>
                    </tr>
                    <tr>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010-12-22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                        <td>Singapore</td>
                        <td>28</td>
                        <td>2010-11-14</td>
                        <td>$357,650</td>
                    </tr>
                    <tr>
                        <td>Brenden Wagner</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>28</td>
                        <td>2011-06-07</td>
                        <td>$206,850</td>
                    </tr>
                    <tr>
                        <td>Fiona Green</td>
                        <td>Chief Operating Officer (COO)</td>
                        <td>San Francisco</td>
                        <td>48</td>
                        <td>2010-03-11</td>
                        <td>$850,000</td>
                    </tr>
                    <tr>
                        <td>Shou Itou</td>
                        <td>Regional Marketing</td>
                        <td>Tokyo</td>
                        <td>20</td>
                        <td>2011-08-14</td>
                        <td>$163,000</td>
                    </tr>
                    <tr>
                        <td>Michelle House</td>
                        <td>Integration Specialist</td>
                        <td>Sydney</td>
                        <td>37</td>
                        <td>2011-06-02</td>
                        <td>$95,400</td>
                    </tr>
                    <tr>
                        <td>Suki Burks</td>
                        <td>Developer</td>
                        <td>London</td>
                        <td>53</td>
                        <td>2009-10-22</td>
                        <td>$114,500</td>
                    </tr>
                    <tr>
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>
                        <td>London</td>
                        <td>27</td>
                        <td>2011-05-07</td>
                        <td>$145,000</td>
                    </tr>
                    <tr>
                        <td>Gavin Cortez</td>
                        <td>Team Leader</td>
                        <td>San Francisco</td>
                        <td>22</td>
                        <td>2008-10-26</td>
                        <td>$235,500</td>
                    </tr>
                    <tr>
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>
                        <td>Edinburgh</td>
                        <td>46</td>
                        <td>2011-03-09</td>
                        <td>$324,050</td>
                    </tr>
                    <tr>
                        <td>Unity Butler</td>
                        <td>Marketing Designer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009-12-09</td>
                        <td>$85,675</td>
                    </tr>
                    <tr>
                        <td>Howard Hatfield</td>
                        <td>Office Manager</td>
                        <td>San Francisco</td>
                        <td>51</td>
                        <td>2008-12-16</td>
                        <td>$164,500</td>
                    </tr>
                    <tr>
                        <td>Hope Fuentes</td>
                        <td>Secretary</td>
                        <td>San Francisco</td>
                        <td>41</td>
                        <td>2010-02-12</td>
                        <td>$109,850</td>
                    </tr>
                    <tr>
                        <td>Vivian Harrell</td>
                        <td>Financial Controller</td>
                        <td>San Francisco</td>
                        <td>62</td>
                        <td>2009-02-14</td>
                        <td>$452,500</td>
                    </tr>
                    <tr>
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>37</td>
                        <td>2008-12-11</td>
                        <td>$136,200</td>
                    </tr>
                    <tr>
                        <td>Jackson Bradshaw</td>
                        <td>Director</td>
                        <td>New York</td>
                        <td>65</td>
                        <td>2008-09-26</td>
                        <td>$645,750</td>
                    </tr>
                    <tr>
                        <td>Olivia Liang</td>
                        <td>Support Engineer</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2011-02-03</td>
                        <td>$234,500</td>
                    </tr>
                    <tr>
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>38</td>
                        <td>2011-05-03</td>
                        <td>$163,500</td>
                    </tr>
                    <tr>
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>Tokyo</td>
                        <td>37</td>
                        <td>2009-08-19</td>
                        <td>$139,575</td>
                    </tr>
                    <tr>
                        <td>Thor Walton</td>
                        <td>Developer</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2013-08-11</td>
                        <td>$98,540</td>
                    </tr>
                    <tr>
                        <td>Finn Camacho</td>
                        <td>Support Engineer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009-07-07</td>
                        <td>$87,500</td>
                    </tr>
                    <tr>
                        <td>Serge Baldwin</td>
                        <td>Data Coordinator</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2012-04-09</td>
                        <td>$138,575</td>
                    </tr>
                    <tr>
                        <td>Zenaida Frank</td>
                        <td>Software Engineer</td>
                        <td>New York</td>
                        <td>63</td>
                        <td>2010-01-04</td>
                        <td>$125,250</td>
                    </tr>
                    <tr>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>56</td>
                        <td>2012-06-01</td>
                        <td>$115,000</td>
                    </tr>
                    <tr>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>43</td>
                        <td>2013-02-01</td>
                        <td>$75,650</td>
                    </tr>
                    <tr>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>46</td>
                        <td>2011-12-06</td>
                        <td>$145,600</td>
                    </tr>
                    <tr>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2011-03-21</td>
                        <td>$356,250</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009-02-27</td>
                        <td>$103,500</td>
                    </tr>
                    <tr>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                        <td>San Francisco</td>
                        <td>30</td>
                        <td>2010-07-14</td>
                        <td>$86,500</td>
                    </tr>
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008-11-13</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011-06-27</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011-01-25</td>
                        <td>$112,000</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
            </table>
>>>>>>> 3017750eec90552c48c1340e7e70acc2a25631d8

            <!-- Teacher logout -> (Homepage/index) |Login Page for now*| -->
            <div class="d-flex float-end">
                <a href="teach_login.php" type="button" class="btn btn-secondary">
                    <img src="../images/profpic.png" alt="" width="20" height="auto"> Log out
                </a>
            </div>
        </div>

        <div class="btn-group" role="group" aria-label="Default button group">
            <button type="button" class="btn btn-outline-primary" disabled data-bs-toggle="button">Grade: </button>

            <form method="GET" action="">
                <button type="submit" class="btn btn-outline-primary" name="grade" value="grade6">6 </button>
                <button type="submit" class="btn btn-outline-primary" name="grade" value="grade7">7</button>
                <button type="submit" class="btn btn-outline-primary" name="grade" value="grade8">8</button>
                <button type="submit" class="btn btn-outline-primary" name="grade" value="grade9">9</button>
            </form>
        </div>


        <!-------------------------- (table) ---------------------------->
        <table id="questions" class="table-success display" width="">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Subject</th>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Correct Option</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['grade'])) {
                    // Get the selected grade from the button
                    $selectedGrade = $_GET['grade'];

                    // Prepare the SQL query based on the selected grade table
                    $sql = "SELECT * FROM `$selectedGrade`";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $questions = $stmt->fetchAll(PDO::FETCH_OBJ);

                    // Display each question row
                    foreach ($questions as $question) { ?>
                        <tr>
                            <td><?php echo $question->qid; ?></td>
                            <td><?php echo $question->subject; ?></td>
                            <td><?php echo $question->queTitle; ?></td>
                            <td><?php echo $question->option1; ?></td>
                            <td><?php echo $question->option2; ?></td>
                            <td><?php echo $question->option3; ?></td>
                            <td><?php echo $question->option4; ?></td>
                            <td><?php echo $question->correctOption; ?></td>
                            <td>
                                <div class="row p-0">

                                    <!-- Edit Button  -->
                                    <div class="p-0 col-6 ">
                                        <!-- Edit Button with Data Attributes -->
                                        <button type="button" class="btn btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editQuestionModal"
                                            data-qid="<?php echo $question->qid; ?>"
                                            data-subject="<?php echo $question->subject; ?>"
                                            data-quetitle="<?php echo $question->queTitle; ?>"
                                            data-option1="<?php echo $question->option1; ?>"
                                            data-option2="<?php echo $question->option2; ?>"
                                            data-option3="<?php echo $question->option3; ?>"
                                            data-option4="<?php echo $question->option4; ?>"
                                            data-correctoption="<?php echo $question->correctOption; ?>">

                                            <!-- Edit button Logo SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20px">
                                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                            </svg>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editQuestionModal" tabindex="-1" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Question</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <!-- form  -->
                                                        <form method="POST" action="update_question.php">

                                                            <!-- hidden input  -->
                                                            <input type="hidden" name="qid" id="qid">
                                                            <input type="hidden" name="grade" value="<?php echo $selectedGrade; ?>">

                                                            <!-- Grade selection -->
                                                            <div class="mb-3 row">
                                                                <label for="grade" class="col-sm-2 col-form-label">Grade:</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-md-3 ">
                                                                        <span class="input-group-text " title="Cannot Edit"><?php echo  ucfirst($selectedGrade); ?></span>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Subject selection -->
                                                            <div class="mb-3 row">
                                                                <label for="subject" class="col-sm-2 col-form-label">Subject<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-md-3">
                                                                        <select class="form-select" name="subject" id="subject" required>
                                                                            <option selected disabled value="">Choose subject...</option>
                                                                            <option value="Science">Science</option>
                                                                            <option value="Math">Math</option>
                                                                            <option value="Health">Health</option>
                                                                            <option value="English">English</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Question  -->
                                                            <div class="mb-3 row">
                                                                <label for="que" class="col-sm-2 col-form-label">Question<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="queTitle" id="queTitle" required>
                                                                </div>
                                                            </div>

                                                            <!-- Options  -->
                                                            <div class="mb-3 row">
                                                                <label for="option1" class="col-sm-2 col-form-label">Option 1<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="option1" id="option1" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="option2" class="col-sm-2 col-form-label">Option 2<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="option2" id="option2" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="option3" class="col-sm-2 col-form-label">Option 3<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="option3" id="option3" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="option4" class="col-sm-2 col-form-label">Option 4<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="option4" id="option4" required>
                                                                </div>
                                                            </div>

                                                            <!-- Correct option selection -->
                                                            <div class="mb-3 row">
                                                                <label for="correctOption" class="col-sm-2 col-form-label">Correct Option<sup><b>*</b></sup>:</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-md-3">
                                                                        <select class="form-select" name="correctOption" id="correctOption" required>
                                                                            <option selected disabled value="">Choose correct option...</option>
                                                                            <option value="option1">Option 1</option>
                                                                            <option value="option2">Option 2</option>
                                                                            <option value="option3">Option 3</option>
                                                                            <option value="option4">Option 4</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Form submission -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    </form>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // When the modal is shown
                                            $('#editQuestionModal').on('show.bs.modal', function(event) {
                                                var button = $(event.relatedTarget); // Button that triggered the modal

                                                // Extract data from data-* attributes
                                                var qid = button.data('qid');
                                                var subject = button.data('subject');
                                                var queTitle = button.data('quetitle');
                                                var option1 = button.data('option1');
                                                var option2 = button.data('option2');
                                                var option3 = button.data('option3');
                                                var option4 = button.data('option4');
                                                var correctOption = button.data('correctoption');

                                                // Populate the modal fields with the data
                                                var modal = $(this);
                                                modal.find('#qid').val(qid);
                                                modal.find('#subject').val(subject);
                                                modal.find('#queTitle').val(queTitle);
                                                modal.find('#option1').val(option1);
                                                modal.find('#option2').val(option2);
                                                modal.find('#option3').val(option3);
                                                modal.find('#option4').val(option4);
                                                modal.find('#correctOption').val(correctOption);
                                            });
                                        });
                                    </script>

                                    <!-- Delete Button -->
                                    <div class="p-0 col-2 ">
                                        <form action="" method="">
                                            <a onclick="return confirm('Are you sure you want to delete this record?')" type="button" class="btn btn-danger" href="queDelete.php?qid=<?php echo $question->qid; ?>&grade=<?php echo $selectedGrade; ?>">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20px">
                                                    <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                                </svg>
                                            </a>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>


                <?php }
                } ?>
            </tbody>

        </table>

        <script defer src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script defer src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
        <script defer src="../js/script.js"></script>
</body>

</html>