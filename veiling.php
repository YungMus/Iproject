<?php
$title = 'Veiling';
$link = 'veiling.php';
session_start();
require_once("includes/header.php");
$item = 131283988452;
if (isset($_GET['item'])) {
    $item = $_GET['item'];
}
if (isset($_POST['Bieden'])) {
    $bod = trim($_POST['Bod']);

    $sql = "SELECT user_id FROM [user] WHERE username = :username";
    $data = $conn->prepare($sql);
    $data ->bindParam(':username', $_SESSION['Username']);
    $data->execute();
    $results = $data->fetchAll();
    $user_id = $results[0]['user_id'];

    $date =  date("Y-m-d H:i:s");

    $sql = 'INSERT INTO Offer (item_id, offer_amount, user_id, offer_day) VALUES(:item, :bod, :user_id, :date)';
    $data = $conn->prepare($sql);
    $data ->bindParam(':item', $item);
    $data ->bindParam(':bod', $bod);
    $data ->bindParam(':user_id', $user_id);
    $data ->bindParam(':date', $date);
    $data->execute();
}

$sql = "select title, startvalue, description, running_endday, running_endtime, placename, username, [file], Rating from Item LEFT join Pictures on Item.item_id = Pictures.item_id inner join [user] on Item.seller = [user].user_id where Item.item_id = :item";
$data = $conn->prepare($sql);
$data ->bindParam(':item', $item);
$data->execute();
$html = "";

$result = $data->fetchAll();

$html .= '<div class="grid-x grid-padding-y grid-padding-y">
    <div class="product-card-thumbnail padding-r">
        <a href="#"><img src="';
if (isset($result[0]["[file]"])){
    $html .= '/pics/' . $result[0]["[file]"];
}
else {
    $html .= "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAS1BMVEX///+hoaGjo6Onp6f39/ft7e2+vr6ysrL8/Pz09PTGxsalpaWqqqqvr6/i4uLz8/PX19fKysrn5+fAwMC4uLje3t7U1NTJycnQ0NB9QKqOAAAEuklEQVR4nO3Z6ZKrKhQG0DCJMjlhmvd/0oNxAo2ddNe9J56qb/3oijhmBzZb+nYDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD475Sc8/L1Ye8ddXL9dy73/LhLEcoyzWxx3z9ooZKNcvBmPGr44dXLTnnDmJFtnTbXrYw3NT5srfX4HEZ+1YdrXEapiAxd5xrFmnyP0nLbqCXpm65rPPE/+vGdJUUYum5ojb5vzXdtWxdv2tr1B7lTG2JTYPvnuBBPl2cr8yg4ardgccvE0ixvP6DCctX4q6y9UpFQ7m4aiJqayoL8tPf+LS3tnu/gOqgtLD0Ry0dHwi/v5dn8YSCHziN0nxx3zcwljo89k/ZWrMESNAmQYtXvbjaQKR2VVB329UmAKvr1uxv8z5Q9md8CrZJgtTqJz3mAX3Bz97zTQ7QrlsanP3uqjyrp/fmOjsa8sQXL+3Sn9Pmx2ZY4H0INmWJg+8MuR9KrDOQkN3yUo+JpOzfjQFmDFfNXulfZNCA1aZMtoY9DbOGn69XaHXa1WZqqyMlv+FHBxN+6br76PnRpz5/GwRosQbKv19CsFBroFi2hzysLNZ/mSByFfGj7vnXLwYVPb1/a84h/TgxHVVDbq94Su3X9Zupwa7AcyTrgkG/G7SXhCCZPsk3ppJnPCiSWEdoUSkli5vQni+zgfPMipKq1n76DkGverufiYA3Writ1+5QykKknCGaf3KRpg/LMb0WWvRkzXaHqpzG870p5jrwIU5htCBVLhzHzo54Fazcqb0u0hH5arxYmvu6wvln6XOGTGaJ9VKD7YBVXDBZjSX8v5yC1es4k7wfrES3B/OmMz8XdLjOvZybZ48e0uQ9WfzaaP4mxNPsEPcZkm8XfHoa3Mcv35jxWD/d5dHud1mlujPw/MQxZVv2JcUhwtj73Gqyl9J65Z2VQ0PbVS0ogj2LU0/RAPiaCUuall79igjdZkuFjebNVotvHXVdqyHEVJc6D7NVLylyuFSRtLB8lap6kyidl6+fJQ7Du2omFt3X8W44va1mR2JpDH4r1VaxwX1VH5tFhFMlrqjEwKrskP3ux+Chl8mHYxDFCyYKx8a84/NLHjDLNg0sFcWqaQfKOOb0s5G3dcQa5gCFboHFxi1crXsi4VY/hzILKD2s0gk7hc+T74TOlQ0HTBC8e6b5OVwZvX8euewFl9iZXmHw629KXS9fjgt69UI5jcDnuu761RMmmpWuY+pRP2ri+Ysoal463Ly72PSbJ9X6LY6V3U1WM1brz22j18zR4T0JfTXksnrh1t6+zBckP48Yu0RJmX38nwdoCwi3L58KapvWVy9Yg4mSw7WvXtQTPlpxUSzOvbfV0iWBDrrn2N4aItYJz3iktD//dSaI3UDPUnNeNYftVnSYbvC7frU3v4nlcNHLruFzSfrypCGx5u76VnqjYVnX9q2nig3hgNL66re//iTSP3OqCaMYoVT9bUy4bP57HiC7SKDaGjI0s8EObveq/KybCue6NEJSdc8/XCl9f/3hiHRv3te3YdsV5EAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD+qj8dkCpgHw38BwAAAABJRU5ErkJggg==";
}
$html .= '"/></a>
    </div>  <div class="cell small-4 flex-container flex-dir-column">

  <h2>';
$html .= $result[0]['username'] . ' ' . $result[0]['Rating'];
$html .= '</h2> <p>';
$html .= $result[0]['running_endday'];
$html .= '&nbsp;&nbsp;';
$html .= $result[0]['running_endtime'];
$html .= '</p> <p>';
$html .= $result[0]['placename'];
$html .= '</p> ';
$html .= '<div class="row flex-container align-left">
    </div>
    <div class="callout text-center align-right"> <p>';
$html .= trim($result[0]['description']);
$html .= '</p>';
$html .= '</div> </div> <h1>';
$html .= $result[0]['title'];
$html .= '&nbsp;&euro;';
$html .= $result[0]['startvalue'];
$html .= '</h1>
</div>
</div>';

echo $html;

$sql = "SELECT TOP 5 username, offer_amount FROM Offer INNER JOIN  [User] ON Offer.user_id = [User].user_id WHERE item_id = :item ORDER BY offer_amount";
$data = $conn->prepare($sql);
$data ->bindParam(':item', $item);
$data->execute();
$html = "<h1>offers:</h1>";
$result = $data->fetchAll();
$count = $data->rowCount();
$index = 0;

while ($index < $count){
    $html .= '<h3>' . $result[$index]['username'] . ' ' . $result[$index]['offer_amount'] . '</h3>';
    $index ++;
}
echo $html;

if (isset($_SESSION['Username'])){
    echo '             <form method="POST" class="form" action="veiling.php">
            <h6 class="multi-step-checkout-step-title-subheader">Bieden</h6>
            <p class="create-account-desc">Vul hier je bod in.</p>
            <label>
                <input type="int" name="Bod" id="Bod" value="">
            <button class="primary button expanded" type="submit" name="Bieden" value="Bieden"
            ">Bied</label></button>
        </form>';
}
else {
    $msg = '<h2>Om te kunnen bieden moet je ingelogd zijn</h2>';
    echo $msg;
}
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>