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
    $query="select * from review natural join Has where meal_id = :mealid";
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













?>