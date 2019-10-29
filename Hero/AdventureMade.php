<?php
$name = htmlentities($_POST['HeroName']);
$name = strtolower($name);
$name = ucwords($name);
$race = $_POST['Race'];
$class = $_POST['Class'];
$age = $_POST['Age'];
$gender = $_POST['gender'];
$kingdom = $_POST['KingdomName'];
$characterport = "<img src = 'Heroimages/";
$charactersheet = "<header><h4>$name from $kingdom </h4><br>"
        . "<b>$race $class</b><br> At the age of $age</header>";

switch ($race) {
    case "Human":
        $characterport = $characterport.'Hu';
        $charactersheet = $charactersheet . "<p><b>Description</b>: Humans come
            in a broad variety of shapes and sizes.  An average Human male in good 
            health stands around six feet tall and weighs about 175 pounds. Most
            Humans live around 75 years.</p> <p><b>Restrictions</b>: Humans may 
            be any single class. They have no minimum or maximum ability score 
            requirements.</p><p><b> Special Abilities</b>: Humans learn unusually 
            quickly, gaining a bonus of 10% to all experience points earned.
            Saving Throws: Humans are the “standard,” and thus have no saving throw bonuses.</p>";

        break;

    case "Elf":
        $characterport = $characterport."El";
        $charactersheet = $charactersheet . "<p><b>Description</b>: Elves are a slender race, with both genders
                standing around five feet tall and weighing around 130
                pounds. Most have dark hair, with little or no body or
                facial hair. Their skin is pale, and they have pointed ears
                and delicate features. Elves are lithe and graceful. They
                have keen eyesight and hearing. Elves are typically
                inquisitive, passionate, self-assured, and sometimes
                haughty. Their typical lifespan is a dozen centuries or
                more.</p>
                <p><b>Restrictions</b>: Elves may become Clerics, Fighters, MagicUsers
                or Thieves; they are also allowed to combine the
                classes of Fighter and Magic-User, and of Magic-User and
                Thief (see Combination Classes, below). They are
                required to have a minimum Intelligence of 9. Due to their
                generally delicate nature, they may not have a
                Constitution higher than 17. Elves never roll larger than
                six-sided dice (d6) for hit points.</p>
                <p><b>Special Abilities</b>: All Elves have Darkvision with a 60'
                range. They are able to find secret doors more often than
                normal (1-2 on 1d6 rather than the usual 1 on 1d6). An
                Elf is so observant that one has a 1 on 1d6 chance to find
                a secret door with a cursory look. Elves are immune to
                the paralyzing attack of ghouls. Also, they are less likely to
                be surprised in combat, reducing the chance of surprise by
                1 in 1d6.</p>
                <p><b>Saving Throws</b>: Elves save at +1 vs. Paralysis or Petrify,
                and +2 vs. Magic Wands and Spells.</p><p>Clerics are those who have devoted themselves to the
                service of a deity, pantheon or other belief system. Most
                Clerics spend their time in mundane forms of service such
                as preaching and ministering in a temple; but there are
                those who are called to go abroad from the temple and
                serve their deity in a more direct way, smiting undead
                monsters and aiding in the battle against evil and chaos.
                Player character Clerics are assumed to be among the
                latter group.</p>
                ";
        break;

    case "Halfling":
        $characterport = $characterport . "Ha";
        $charactersheet = $charactersheet . "<p><b>Description</b>: Halflings are small, slightly stocky folk who
            stand around three feet tall and weigh about 60 pounds.
            They have curly brown hair on their heads and feet, but
            rarely have facial hair. They are usually fair skinned, often
            with ruddy cheeks. Halflings are remarkably rugged for
            their small size. They are dexterous and nimble, capable
            of moving quietly and remaining very still. They usually
            go barefoot. Halflings are typically outgoing, unassuming
            and good-natured. They live about a hundred years.</p>
            <p><b>Restrictions</b>: Halflings may become Clerics, Fighters or
            Thieves. They are required to have a minimum Dexterity
            of 9. Due to their small stature, they may not have a
            Strength higher than 17. Halflings never roll larger than
            six-sided dice (d6) for hit points regardless of class.
            Halflings may not use Large weapons, and must wield
            Medium weapons with both hands.</p>
            <p><b>Special Abilities</b>: Halflings are unusually accurate with all
            sorts of ranged weapons, gaining a +1 attack bonus when
            employing them. When attacked in melee by creatures
            larger than man-sized, Halflings gain a +2 bonus to their
            Armor Class. Halflings are quick-witted, thus adding +1 to
            Initiative die rolls. Outdoors in their preferred forest
            terrain, they are able to hide very effectively; so long as
            they remain still there is only a 10% chance they will be
            detected. Even indoors, in dungeons or in non-preferred
            terrain they are able to hide such that there is only a 30%
            chance of detection. Note that a Halfling Thief will roll
            only once, using either the Thief ability or the Halfling
            ability, whichever is better.</p>
            <p><b>Saving Throws</b>: Halflings save at +4 vs. Death Ray or
            Poison, Magic Wands, Paralysis or Petrify, and Spells, and
            at +3 vs. Dragon Breath.</p><p>Fighters include soldiers, guardsmen, barbarian warriors,
            and anyone else for whom fighting is a way of life. They
            train in combat, and they generally approach problems
            head on, weapon drawn.</p>";
        break;

    case "Dwarf":
        $characterport = $characterport . "Dw";
        $charactersheet = $charactersheet . "<p><b>Description</b>: Dwarves are a short, stocky race; both male
            and female Dwarves stand around four feet tall and
            typically weigh around 120 pounds. Their long hair and
            thick beards are dark brown, gray or black. They take
            great pride in their beards, sometimes braiding or forking
            them. They have a fair to ruddy complexion. Dwarves
            have stout frames and a strong, muscular build. They are
            rugged and resilient, with the capacity to endure great
            hardships. Dwarves are typically practical, stubborn and
            courageous. They can also be introspective, suspicious
            and possessive. They have a lifespan of three to four
            centuries.</p>
            <p><b>Restrictions</b>: Dwarves may become Clerics, Fighters, or
            Thieves. They are required to have a minimum
            Constitution of 9. Due to their generally dour dispositions,
            they may not have a Charisma higher than 17. They may
            not employ Large weapons more than four feet in length
            (specifically, two-handed swords, polearms, and
            longbows).</p>
            <p><b>Special Abilities</b>: All Dwarves have Darkvision with a 60'
            range, and are able to detect slanting passages, traps,
            shifting walls and new construction on a roll of 1-2 on 1d6;
            a search must be performed before this roll may be made.</p>
            <p><b>Saving Throws</b>: Dwarves save at +4 vs. Death Ray or
            Poison, Magic Wands, Paralysis or Petrify, and Spells, and
            at +3 vs. Dragon Breath.</p>";

        break;
}

switch ($class) {

    case "Cleric":
        $characterport = $characterport . "Cl";
        $charactersheet = $charactersheet . "<p>Clerics are those who have devoted themselves to the
            service of a deity, pantheon or other belief system. Most
            Clerics spend their time in mundane forms of service such
            as preaching and ministering in a temple; but there are
            those who are called to go abroad from the temple and
            serve their deity in a more direct way, smiting undead
            monsters and aiding in the battle against evil and chaos.
            Player character Clerics are assumed to be among the
            latter group.</p>
            <p>Clerics fight about as well as Thieves, but not as well as
            Fighters. They are hardier than Thieves, at least at lower
            levels, as they are accustomed to physical labor that the
            Thief would deftly avoid. Clerics can cast spells of divine
            nature starting at 2nd level, and they have the power to
            Turn the Undead, that is, to drive away undead monsters
            by means of faith alone (see the Encounter section for
            details).</p>
            <p>The Prime Requisite for Clerics is Wisdom; a character
            must have a Wisdom score of 9 or higher to become a
            Cleric. They may wear any armor, but may only use blunt
            weapons (specifically including warhammer, mace, maul,
            club, quarterstaff, and sling).</p> ";

        break;

    case "Fighter":

        $characterport = $characterport . "Fi";
        $charactersheet = $charactersheet . "<p>Fighters include soldiers, guardsmen, barbarian warriors,
            and anyone else for whom fighting is a way of life. They
            train in combat, and they generally approach problems
            head on, weapon drawn.</p><p>Not surprisingly, Fighters are best at fighting of all the
            classes. They are also the hardiest, able to take more
            punishment than any other class. Although they are not
            skilled in the ways of magic, Fighters can nonetheless use
            many magic items, including but not limited to magical
            weapons and armor.</p>
            <p>The Prime Requisite for Fighters is Strength; a character
            must have a Strength score of 9 or higher to become a
            Fighter. Members of this class may wear any armor and
            use any weapon.</p>";

        break;

    case "Magic-User":

        $characterport = $characterport . "Ma";
        $charactersheet = $charactersheet . "<p>Magic-Users are those who seek and use knowledge of the
            arcane. They do magic not as the Cleric does, by faith in a
            greater power, but rather through insight and
            understanding.</p>
            <p>Magic-Users are the worst of all the classes at fighting;
            hours spent studying massive tomes of magic do not lead
            a character to become strong or adept with weapons.
            They are the least hardy, equal to Thieves at lower levels
            but quickly falling behind.</p>
            <p>The Prime Requisite for Magic-Users is Intelligence; a
            character must have an Intelligence score of 9 or higher to
            become a Magic-User. The only weapons they become
            proficient with are the dagger and the walking staff (or
            cudgel). Magic-Users may not wear armor of any sort nor
            use a shield as such things interfere with spellcasting.</p> ";

        break;

    case "Thief":

        $characterport = $characterport . "Th";
        $charactersheet = $charactersheet . "<p>Thieves are those who take what they want or need by
            stealth, disarming traps and picking locks to get to the gold
            they crave; or “borrowing” money from pockets,
            beltpouches, etc. right under the nose of the “mark”
            without the victim ever knowing.</p>
            <p>Thieves fight better than Magic-Users but not as well as
            Fighters. Avoidance of honest work leads Thieves to be
            less hardy than the other classes, though they do pull
            ahead of the Magic-Users at higher levels.</p>
            <p>The Prime Requisite for Thieves is Dexterity; a character
            must have a Dexterity score of 9 or higher to become a
            Thief. They may use any weapon, but may not wear
            metal armor as it interferes with stealthy activities, nor may
            they use shields of any sort. Leather armor is acceptable,
            however.</p>";

        break;
}

switch ($gender) {

    case "Male":
        $characterport = $characterport ."Ma.jpg'";
        break;
    case "Female":
        $characterport = $characterport . "Fe.jpg'";
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>A made Adventurer</title>
        <link href="herocss.css" rel="stylesheet" type="text/css">
        <style>
            img {
                height: 250px;
                padding: 3pt;
                float: right;
            }
        </style>
    </head>
    <body>
        <div id="form_container">
            <h3 class="Content">The Brave Adventurer</h3>
            <?php
            echo '<div class="CharacterSheet">';
            print $characterport;
            print $charactersheet;
            echo '</div>';
            ?>
    </body>
</html>