<?php

include_once("adminheader.php");

?>

<section>
    <!-- second section starts here -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header bg-secondary ">
                        <h3 class="myadmintext text-white">Latest requests</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="myadmintext text-muted">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name </th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Gender</th>
                        <th>Details</th>
                        <th>Status</th>
                    </tr>
                </thead>

            <tbody class="myadmintext">

            <tr>
                <td>1</td>
                <td>Matthew </td>
                <td>Cymentho</td>
                <td>matthew@cymentho.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 5-7 years old healthy boy.</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>

            
            <tr>
                <td>2</td>
                <td>Michael</td>
                <td>Blaque</td>
                <td>michael@blaque.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 7-9 years old healthy girl</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>Young</td>
                <td>Prince</td>
                <td>young@prince.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 9-10 years old boy or girl</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>

            
            <tr>
                <td>4</td>
                <td>Young</td>
                <td>Brown</td>
                <td>young@brown.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 5 years old beautiful girl</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>

            <tr>
                <td>5</td>
                <td>The</td>
                <td>Law</td>
                <td>the@law.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 12 years old girl</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>

            
            <tr>
            
                <td>6</td>
                <td>Elon</td>
                <td>Musk</td>
                <td>elon@musk.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 10 years old boy</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>

            <tr>
            
                <td>7</td>
                <td>Bill</td>
                <td>Gate</td>
                <td>bill@gate.com</td>
                <td>18 -06 -2022</td>
                <td>Male</td>
                <td>A 7 years old girl</td>
                <td>
                    <input type="submit" name="accept" value="accept" class="btn btn-success">
            
                    <input type="submit" name="accept" value="decline" class="btn btn-danger">
                </td>
            </tr>
                                </tbody>
                            </table>
                            <!-- card text ends here -->
                        </div>
                        <!-- card body ends here -->
                    </div>
                    <!-- card ends here -->
                </div>
            </div>
            <!-- row ends here -->
        </div>
        <!-- container ends here -->
    </div>
    <!-- second section ends here -->
</section>

<?php

include_once("adminfooter.php");

?>