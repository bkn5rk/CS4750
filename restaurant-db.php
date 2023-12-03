<?php

//ini_set('display_errors', 1);

function getAllRestaurants()
{
    global $db;
    $query="select * from restaurant";
    $statement=$db->prepare($query);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getOneRestaurant($restid)
{
    global $db;
    $query="select * from restaurant where restaurant_id = :restid";
    $statement=$db->prepare($query);
    $statement->bindValue(':restid', $restid);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
   
}

function getOneMeal($mealid)
{
    global $db;
    $query="select * from meal where meal_id = :mealid";
    $statement=$db->prepare($query);
    $statement->bindValue(':mealid', $mealid);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
   
}

function getCategories($restid)
{
    global $db;
    $query="select * from restaurant_category where restaurant_id = :restid";
    $statement=$db->prepare($query);
    $statement->bindValue(':restid', $restid);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
   
}

function getRestMeals($restid)
{
    global $db;
    $query="select * from meal where restaurant_id = :restid";
    $statement=$db->prepare($query);
    $statement->bindValue(':restid', $restid);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
   
}

function getReviews($mealid)
{
    global $db;
    $query="select * from review natural join Has natural join Users where meal_id = :mealid";
    $statement=$db->prepare($query);
    $statement->bindValue(':mealid', $mealid);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
   
}


function addReview($reviewrating, $reviewtext, $mealid, $restid, $userid)
{
    global $db;
    $query="select max(review_id) + 1 as maxid from review";
    $statement=$db->prepare($query);
    $statement->execute();
    $numrevs=$statement->fetchAll();
    $statement->closeCursor();


    $query="insert into review values (:userid, :reviewid, :reviewrating, :reviewtext)";
    $statement=$db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->bindValue(':reviewid', $numrevs[0]['maxid']);
    $statement->bindValue(':reviewrating', $reviewrating);
    $statement->bindValue(':reviewtext', $reviewtext);
    $statement->execute();
   $statement->closeCursor();

   $query="insert into Has values (:userid, :reviewid, :mealid, :restid)";
    $statement=$db->prepare($query);
    $statement->bindValue(':userid', $userid);
    $statement->bindValue(':reviewid', $numrevs[0]['maxid']);
    $statement->bindValue(':mealid', $mealid);
    $statement->bindValue(':restid', $restid);
    $statement->execute();
   $statement->closeCursor();

}

function deleteReview($reviewid)
{
    global $db;
    $query="delete from Has where review_id=:reviewid";
    $statement=$db->prepare($query);
    $statement->bindValue(':reviewid', $reviewid);
    $statement->execute();

   $statement->closeCursor();
   global $db;
   $query="delete from review where review_id=:reviewid";
   $statement=$db->prepare($query);
   $statement->bindValue(':reviewid', $reviewid);
   $statement->execute();

  $statement->closeCursor();
}

function getOneProfile($name, $email, $password)
{
    global $db;
    $query="select * from Users where name = :name and email = :email and passwords = :password ";
    $statement=$db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getOneProfileWithID($user_id)
{
    global $db;
    $query="select * from Users where user_id = :user_id";
    $statement=$db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function updateReview($reviewrating, $reviewtext, $revid)
{
    global $db;
    $query="update review set rating=:rating, review_text=:review_text where review_id=:review_id";
    $statement=$db->prepare($query);
    $statement->bindValue(':rating', $reviewrating);
    $statement->bindValue(':review_text', $reviewtext);
    $statement->bindValue(':review_id', $revid);
    
    $statement->execute();

   $statement->closeCursor();
}

function getRestaurantOwner($restid)
{
    global $db;
    $query="select * from Owns where restaurant_id = :restid";
    $statement=$db->prepare($query);
    $statement->bindValue(':restid', $restid);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function addMeal($mealname, $mealprice, $mealdesc, $restid)
{
    global $db;
    $query="select max(meal_id) + 1 as maxid from meal";
    $statement=$db->prepare($query);
    $statement->execute();
    $nummeals=$statement->fetchAll();
    $statement->closeCursor();


    $query="insert into meal values (:restid, :mealid, :mealprice, :mealname, :mealdesc)";
    $statement=$db->prepare($query);
    $statement->bindValue(':restid', $restid);
    $statement->bindValue(':mealid', $nummeals[0]['maxid']);
    $statement->bindValue(':mealprice', $mealprice);
    $statement->bindValue(':mealname', $mealname);
    $statement->bindValue(':mealdesc', $mealdesc);
    $statement->execute();
   $statement->closeCursor();
}

function deleteMeal($mealid)
{
    global $db;
    $query="delete from meal where meal_id=:mealid";
    $statement=$db->prepare($query);
    $statement->bindValue(':mealid', $mealid);
    $statement->execute();
   $statement->closeCursor();
   
}

function checkCus($id)
{
    global $db;
    $query="select * from customer where user_id=:id";
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    if (empty($results))
        return false;
    else
        return true;
    
}

function updateProfile($user_id, $name, $email, $passwords)
{
    global $db;
    $query = "UPDATE Users SET name = :name, email = :email, passwords = :passwords WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':passwords', $passwords);
    if (!$statement->execute()) {
        // Display or log the error
        die("Database update failed: " . $statement->errorInfo()[2]);
    }
    $results= "updated successfully";
    $statement->closeCursor();
    return $results;
}
function findUserNum(){
    global $db;
    $query="select count(*) as num from Users";
    $statement=$db->prepare($query);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function addUser($user_id, $name, $email, $passwords)
{
    global $db;
    $query="insert into Users values (:user_id, :name, :email, :passwords)";
    $statement=$db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':passwords', $passwords);
    if (!$statement->execute()) {
        // Display or log the error
        die("Database update failed: " . $statement->errorInfo()[2]);
    }
    $results= "updated successfully";
    $statement->closeCursor();
    return $results;
}

function addUserType($user_id, $type)
{
    global $db;
    if ($type == "Owner"){
    $query="insert into owner values (:user_id)";
    $statement=$db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
    }
    else{
        $query="insert into customer values (:user_id)";
        $statement=$db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
       $statement->closeCursor();
    }
}

function addPhoneNumber($user_id, $phone_number)
{
    global $db;
    $query="insert into Users_phones values (:user_id, :phone_number)";
    $statement=$db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->execute();
   $statement->closeCursor();
}

function updatePhone($user_id, $phone_number, $phone_number_old)
{
    global $db;
    $query = "UPDATE Users_phones SET phone_number = :phone_number WHERE user_id = :user_id and phone_number = :phone_number_old";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->bindValue(':phone_number_old', $phone_number_old);
    if (!$statement->execute()) {
        // Display or log the error
        die("Database update failed: " . $statement->errorInfo()[2]);
    }
    $results= "updated successfully";
    $statement->closeCursor();
    return $results;
}

function findPhone($user_id){
    global $db;
    $query="select * from Users_phones where user_id = :user_id";
    $statement=$db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $results=$statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function findUserType($user_id) {
    global $db;
    $owner_query = "select * from owner where user_id = :user_id";
    $owner_statement = $db->prepare($owner_query);
    $owner_statement->bindValue(":user_id", $user_id);
    $owner_statement->execute();
    $owner_results = $owner_statement->fetchAll();
    $owner_statement->closeCursor();
    
    $customer_query = "select * from customer where user_id = :user_id";
    $customer_statement = $db->prepare($customer_query);
    $customer_statement->bindValue(":user_id", $user_id);
    $customer_statement->execute();
    $customer_results = $customer_statement->fetchAll();
    $customer_statement->closeCursor();

    if (count($owner_results) > 0) {
        return "owner";
    }
    if (count($customer_results) > 0) {
        return "customer";
    }
}


function addRestaurants($user_id, $array){
    for ($x = 0; $x < count($array); $x++) {
        echo $array[$x];
        global $db;
        $query= "insert into Owns values (:user_id, :restaurant_id)";
        $statement = $db->prepare($query);
        $statement->bindValue(":user_id", $user_id);
        $statement->bindValue(":restaurant_id", $array[$x]);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
    }
}

?>