
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Onboarding Group Generator</title>
  </head>
  <body>
    <center><h1>Onboarding Small Group Generator</h1></center>
    <!--Create new shuffler object, group size of 3-->
    <?php $shuffle1 = new Shuffler(3) ?>
    <style>
      h1 {
        margin-bottom: 40px;
      }

      .group {
        margin-left: 10px;
        margin-right: 10px;
        flex-basis: 13%;
      }

      #groups_body {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-left: 5% !important;
      }

      .group_heading{
        text-decoration: underline;
      }

      h3 {
        margin-bottom: 0px;
      }
    </style>

    <?php
    class Shuffler {
      public static $ob_leaders = array("Chris", "Bo", "Josh", "Josue", "Eric", "Neubs", "Brittany");
      public static $ob_members = array("Alaine", "Alex Monroe", "David A", "Davis", "Enzo", "Halle", "Kevin", "Matthew W",
      "Sam", "Sean M", "Austin", "Abby", "Antonio", "Clare", "JT", "Lauren", "Tori", "Matt Francis", "James McCoy",
      "Mo", "Zach Rob", "Alexa", "Alyssa", "Christina", "Danny", "Jack", "Natalie K", "Zach M", "Emily",
      'Laura', 'Natalie C', "Eva", "Ben", "Johnny", "Elly", "Tobey");
      public $groupsArray = array();
      public $count = 1;
      public $membersPerGroup;

      public function __construct($membersPerGroup){

        $this->membersPerGroup = $membersPerGroup;
        $this->shuffleGroups();
        $this->distributeMembers($this->membersPerGroup);
        echo "<div id='groups_body'>";
        $this->printGroups();
        echo "</div>";
      }

    //shuffles initial groups
      public function shuffleGroups(){
        shuffle(self::$ob_leaders);
        shuffle(self::$ob_members);
      }

    //prints distributed groups
      public function printGroups(){
        foreach ($this->groupsArray as $group){
          echo "<div class='group'><h3 class='group_heading'>Group " . $this->count . "</h3></br>";
          echo "Leader: <strong>" . self::$ob_leaders[($this->count) % 7] . " </strong><br>";
          echo "<ul>";

          foreach($group as $member){
            echo "<li>" . $member . "</li>";
          }
          echo "</ul></div>";
          $this->count++;
        }
      }

    //distributes members into sub arrays
      public function distributeMembers($perGroup){
        $this->groupsArray = array_chunk(self::$ob_members, $perGroup);
        //if members per group is equal to 5, it puts the remaining member onto the previous to make 1 group of 6;
        if ($this->membersPerGroup == 5){
          $this->groupsArray[6][] = $this->groupsArray[7][0];
          array_splice($this->groupsArray, 7, 8);
        }
      }
    }

    ?>
  </body>
</html>
