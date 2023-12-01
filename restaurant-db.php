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









?>