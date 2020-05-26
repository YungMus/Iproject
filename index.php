<?php
$title = 'Homepagina';
$link = 'index.php';
session_start();
require_once("includes/header.php");
?>
<div class="hero-section">
    <div class="hero-section-text">
        <h1>Eenmaal Andermaal</h1>
        <h5>Geef je spullen een tweede kans</h5>
    </div>
</div>
<br>
<nav class="hover-underline-menu" data-menu-underline-from-center>
    <ul class="menu align-center">
        <li><a href="#">Één</a></li>
        <li><a href="#">Twee</a></li>
        <li><a href="#">Drie</a></li>
        <li><a href="#">Vier</a></li>
    </ul>
</nav>
<br>
<div class="grid-x grid-padding-y grid-padding-x">
    <div class="cell small-4 align-self-top"></div>
    <div class="cell small-4 flex-container flex-dir-column">
    <div class="callout primary flex-child-auto">
    Dit is de site van Iconcepts. Op deze site kunt u gemakkelijk veilingen zetten en op veilingen bieden. Als u wilt bieden moet u eerst een account aanmaken.
    Dit kan op <a href="register.php">register</a>. Als u dit eenmaal heeft gedaan kunt u volledig gebruik van onze website maken.
</div>
</div>
</div>

<article class="product-cards">

<?php
    $sql = "select TOP 5 title, startvalue, description, thumbnail, item_id from Item";
    $data = $conn->prepare($sql);
    $data->execute();
    $result = $data->fetchAll();
    $count = $data->rowCount();
    $index = 0;
    $html = "";

    while($index < $count){
        $html .= '<div class="product-card">
    <div class="product-card-thumbnail">
           <img src="';
        if ($result[$index]['thumbnail'] != NULL){
            $html .= 'http://iproject43.icasites.nl/thumbnails/' . $result[$index]['thumbnail'];
        }
        else {
            $html .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAS1BMVEX///+hoaGjo6Onp6f39/ft7e2+vr6ysrL8/Pz09PTGxsalpaWqqqqvr6/i4uLz8/PX19fKysrn5+fAwMC4uLje3t7U1NTJycnQ0NB9QKqOAAAEuklEQVR4nO3Z6ZKrKhQG0DCJMjlhmvd/0oNxAo2ddNe9J56qb/3oijhmBzZb+nYDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD475Sc8/L1Ye8ddXL9dy73/LhLEcoyzWxx3z9ooZKNcvBmPGr44dXLTnnDmJFtnTbXrYw3NT5srfX4HEZ+1YdrXEapiAxd5xrFmnyP0nLbqCXpm65rPPE/+vGdJUUYum5ojb5vzXdtWxdv2tr1B7lTG2JTYPvnuBBPl2cr8yg4ardgccvE0ixvP6DCctX4q6y9UpFQ7m4aiJqayoL8tPf+LS3tnu/gOqgtLD0Ry0dHwi/v5dn8YSCHziN0nxx3zcwljo89k/ZWrMESNAmQYtXvbjaQKR2VVB329UmAKvr1uxv8z5Q9md8CrZJgtTqJz3mAX3Bz97zTQ7QrlsanP3uqjyrp/fmOjsa8sQXL+3Sn9Pmx2ZY4H0INmWJg+8MuR9KrDOQkN3yUo+JpOzfjQFmDFfNXulfZNCA1aZMtoY9DbOGn69XaHXa1WZqqyMlv+FHBxN+6br76PnRpz5/GwRosQbKv19CsFBroFi2hzysLNZ/mSByFfGj7vnXLwYVPb1/a84h/TgxHVVDbq94Su3X9Zupwa7AcyTrgkG/G7SXhCCZPsk3ppJnPCiSWEdoUSkli5vQni+zgfPMipKq1n76DkGverufiYA3Writ1+5QykKknCGaf3KRpg/LMb0WWvRkzXaHqpzG870p5jrwIU5htCBVLhzHzo54Fazcqb0u0hH5arxYmvu6wvln6XOGTGaJ9VKD7YBVXDBZjSX8v5yC1es4k7wfrES3B/OmMz8XdLjOvZybZ48e0uQ9WfzaaP4mxNPsEPcZkm8XfHoa3Mcv35jxWD/d5dHud1mlujPw/MQxZVv2JcUhwtj73Gqyl9J65Z2VQ0PbVS0ogj2LU0/RAPiaCUuall79igjdZkuFjebNVotvHXVdqyHEVJc6D7NVLylyuFSRtLB8lap6kyidl6+fJQ7Du2omFt3X8W44va1mR2JpDH4r1VaxwX1VH5tFhFMlrqjEwKrskP3ux+Chl8mHYxDFCyYKx8a84/NLHjDLNg0sFcWqaQfKOOb0s5G3dcQa5gCFboHFxi1crXsi4VY/hzILKD2s0gk7hc+T74TOlQ0HTBC8e6b5OVwZvX8euewFl9iZXmHw629KXS9fjgt69UI5jcDnuu761RMmmpWuY+pRP2ri+Ysoal463Ly72PSbJ9X6LY6V3U1WM1brz22j18zR4T0JfTXksnrh1t6+zBckP48Yu0RJmX38nwdoCwi3L58KapvWVy9Yg4mSw7WvXtQTPlpxUSzOvbfV0iWBDrrn2N4aItYJz3iktD//dSaI3UDPUnNeNYftVnSYbvC7frU3v4nlcNHLruFzSfrypCGx5u76VnqjYVnX9q2nig3hgNL66re//iTSP3OqCaMYoVT9bUy4bP57HiC7SKDaGjI0s8EObveq/KybCue6NEJSdc8/XCl9f/3hiHRv3te3YdsV5EAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD+qj8dkCpgHw38BwAAAABJRU5ErkJggg==";
        }
        $html .= '"/> 
    </div>
    <h2 class="product-card-title ">';
        $html .= $result[$index]["title"];
        $html .= '</h2>
    <span class="product-card-desc">';
        $html .= $result[$index]["description"];
        $html .= '</span>
    <span class="product-card-price">';
        $html .= '&euro;' . $result[$index]["startvalue"];
        $html .= '</span>
    <div class="product-card-colors">';

        $sqlA = "select TOP 3 [file] from Pictures WHERE item_id = :item_id";
        $dataA = $conn->prepare($sqlA);
        $dataA->bindParam(':item_id',  $result[$index][4]);
        $dataA->execute();
        $resultA = $dataA->fetchAll();
        $countA = $dataA->rowCount();

        for ($y = 0; $y < $countA; $y ++) {
            $html .= '<button href="#" class="product-card-color-option"><img src="http://iproject43.icasites.nl/pics/' . $resultA[$y][0]. '"/></button>';
        }
        $html .= '</div></div> <br>';
        $index ++;
    }
    echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>
