<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Make a Character for the Adventure</title>
        <link href="herocss.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="form_container">
            <form method = "post" action = "AdventureMade.php">
                <ul class="appnitro">
                    <li class="first">Name:</li>
                    <li class="text"><input type="text" name="HeroName"></li>
                    <li class="first">Race:</li>
                    <li class="text"><select name="Race">
                            <option value ="Human">Human</option>
                            <option value ="Elf">Elf</option>
                            <option value ="Halfling">Halfling</option>
                            <option value ="Dwarf">Dwarf</option>
                        </select>
                    </li>
                    <li class="first">Class:</li>
                    <li class="select"><select name="Class">
                            <option value ="Cleric">Cleric</option>
                            <option value ="Fighter">Fighter</option>
                            <option value ="Magic-User">Magic-User</option>
                            <option value ="Thief">Thief</option>
                        </select></li>
                    <li class="first">Age:</li>
                    <li class="text"><input type="text" name="Age"></li>
                    <li class="first">Gender:</li>
                    <li class="radio"><input type="radio" value="Male" name="gender">Male<input type="radio" value="Female" name="gender">Female</li>
                    <li class="first">Kingdom:</li>
                    <li class="text"><input type="text" name="KingdomName"></li>
                    <li><input type="submit" name="Create" value="Create Me"></li>                
                </ul>

            </form>
        </div>
    </body>
</html>