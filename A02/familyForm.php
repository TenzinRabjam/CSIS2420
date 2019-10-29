<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
        <script src="validate.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid text-center">
            <h2>Address Book</h2>
            <p>Search: to search a contact please enter their first and last name.</p>
            <p>Update: to update your contact info fill the entire form.</p>
            <p>Create: to create an account please fill out the entire form.</p>
        </div>
        <div class="container-fluid">
            <form action="familyResult.php" method="post" name="form">
                <table class="table table-responsive text-center">
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="fName">
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="lName">
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="phone">
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address">
                        </td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>
                            <input type="text" name="city">
                        </td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td class="selection">
                            <select name="state">
                                <option value="state">--State--</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Zip</td>
                        <td>
                            <input type="text" name="zip">
                        </td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><select name="month">
                                <option value='month'>--month--</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                                <option value='11'>11</option>
                                <option value='12'>12</option> 
                            </select>
                            <select name="day">
                                <option value='day'>--day--</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                                <option value='11'>11</option>
                                <option value='12'>12</option>
                                <option value='13'>13</option>
                                <option value='14'>14</option>
                                <option value='15'>15</option>
                                <option value='16'>16</option>
                                <option value='17'>17</option>
                                <option value='18'>18</option>
                                <option value='19'>19</option>
                                <option value='20'>20</option>
                                <option value='21'>21</option>
                                <option value='22'>22</option>
                                <option value='23'>23</option>
                                <option value='24'>24</option>
                                <option value='25'>25</option>
                                <option value='26'>26</option>
                                <option value='27'>27</option>
                                <option value='28'>28</option>
                                <option value='29'>29</option>
                                <option value='30'>30</option>
                                <option value='31'>31</option>
                            </select>
                            <select name="year">
                                <option value='year'>--year--</option>
                                <option value='2016'>2016</option>
                                <option value='2015'>2015</option>
                                <option value='2014'>2014</option>
                                <option value='2013'>2013</option>
                                <option value='2012'>2012</option>
                                <option value='2011'>2011</option>
                                <option value='2010'>2010</option>
                                <option value='2009'>2009</option>
                                <option value='2008'>2008</option>
                                <option value='2007'>2007</option>
                                <option value='2006'>2006</option>
                                <option value='2005'>2005</option>
                                <option value='2004'>2004</option>
                                <option value='2003'>2003</option>
                                <option value='2002'>2002</option>
                                <option value='2001'>2001</option>
                                <option value='2000'>2000</option>
                                <option value='1999'>1999</option>
                                <option value='1998'>1998</option>
                                <option value='1997'>1997</option>
                                <option value='1996'>1996</option>
                                <option value='1995'>1995</option>
                                <option value='1994'>1994</option>
                                <option value='1993'>1993</option>
                                <option value='1992'>1992</option>
                                <option value='1991'>1991</option>
                                <option value='1990'>1990</option>
                                <option value='1989'>1989</option>
                                <option value='1988'>1988</option>
                                <option value='1987'>1987</option>
                                <option value='1986'>1986</option>
                                <option value='1985'>1985</option>
                                <option value='1984'>1984</option>
                                <option value='1983'>1983</option>
                                <option value='1982'>1982</option>
                                <option value='1981'>1981</option>
                                <option value='1980'>1980</option>
                                <option value='1979'>1979</option>
                                <option value='1978'>1978</option>
                                <option value='1977'>1977</option>
                                <option value='1976'>1976</option>
                                <option value='1975'>1975</option>
                                <option value='1974'>1974</option>
                                <option value='1973'>1973</option>
                                <option value='1972'>1972</option>
                                <option value='1971'>1971</option>
                                <option value='1970'>1970</option>
                                <option value='1969'>1969</option>
                                <option value='1968'>1968</option>
                                <option value='1967'>1967</option>
                                <option value='1966'>1966</option>
                                <option value='1965'>1965</option>
                                <option value='1964'>1964</option>
                                <option value='1963'>1963</option>
                                <option value='1962'>1962</option>
                                <option value='1961'>1961</option>
                                <option value='1960'>1960</option>
                                <option value='1959'>1959</option>
                                <option value='1958'>1958</option>
                                <option value='1957'>1957</option>
                                <option value='1956'>1956</option>
                                <option value='1955'>1955</option>
                                <option value='1954'>1954</option>
                                <option value='1953'>1953</option>
                                <option value='1952'>1952</option>
                                <option value='1951'>1951</option> 
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username">       
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td>Sex: </td>
                        <td><input name="sex" type="radio" checked="checked" value="Male"> Male 
                            <input name="sex" type="radio"  value="Female"> Female
                        </td>
                    </tr>
                    <tr>
                        <td>Relationship</td>
                        <td>
                            <select name="relation">
                                <option value='relation'>--relation--</option>
                                <option value="friend">Friend</option>
                                <option value="grand">GrandParent</option>                                        
                                <option value="child">Child</option>
                                <option value="sibling">Sibling</option>
                                <option value="parentSib">Aunt/Uncle</option>
                                <option value="cousin">Cousin</option>
                                <option value="coworker">Co-worker</option>
                                <option value="enemy">Enemy</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-primary" type="submit" value="Search" name="requestType" onclick="return(searchverify());"> </td>
                        <td><input class="btn btn-primary" type="submit" value="Update" name="requestType" onclick="return(verify());"></td>
                        <td><input class="btn btn-primary" type="submit" value="Create"  name="requestType" onclick="return(verify());"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
