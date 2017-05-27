<?php
require_once("core/init.php");
global $link;

if(isset($_GET['rating']) && isset($_GET['id']))
{
            $rating = $_GET['rating'];
            $id       = $_GET['id'];
            mysqli_query($link, "UPDATE rating SET rating = rating + ".$rating.",voter = voter + 1 where id = '".$id."'");
}
$q = mysqli_query($link, "SELECT * FROM rating");

while($d=mysqli_fetch_array($q))
{


            $id       = $d['id'];
            $nama = $d['nama'];
            $rating = $d['rating'];
            $voter = $d['voter'];
            if($rating == 0 || $voter == 0)
            {
                        $rate = 0;
            }
            else
            {
                        $rata = $rating/$voter;
                        $rate = round($rata);
            }

            echo "<div class='ratink'>";
            echo "<div class='tampil_rating'>";
            echo "<b>".$nama."</b> mempunyai rating : ".$rate." ";
            if($rate == 1)
            {
                        echo "<img src='rating.jpg' width='25' />";
            }
            else if($rate == 2)
            {
                        for($i=1;$i<=2;$i++)
                                    echo "<img src='rating.jpg' width='25' />";
            }
            else if($rate == 3)
            {
                        for($i=1;$i<=3;$i++)
                                    echo "<img src='rating.jpg' width='25' />";
            }
            else if($rate == 4)
            {
                        for($i=1;$i<=4;$i++)
                                    echo "<img src='rating.jpg' width='25' />";
            }
            else if($rate == 5)
            {
                        for($i=1;$i<=5;$i++)
                                    echo "<img src='rating.jpg' width='25' />";
            }
            echo "</div>";


            echo "<div class='berirating'>";
            echo "Beri rating : ";
            for($i=1;$i<=5;$i++)
            {
                        ?>
                        <img id="<?php echo $id."_".$i; ?>" src="rating.png" width="25" onmouseover="diatasRating('<?php echo $i; ?>','<?php echo $id; ?>');" onmouseout="diatasRatin('<?php echo $i; ?>','<?php echo $id; ?>');" onclick="beriRating('<?php echo $i; ?>','<?php echo $id; ?>');" />
                        <?php
            }
            echo "</div></div>";
}
?>
