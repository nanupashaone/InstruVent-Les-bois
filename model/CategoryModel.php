<?php
# menu - to PDO with query
function getAllCategoryMenu(PDO $db): array {
    $sql ="SELECT categoryID, cat_instrument FROM category_instrument ORDER BY categoryID ASC";
    try{
        $query=$db->query($sql);
    }catch(Exception $e){
        die($e->getMessage());
    }
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// récupère une catégorie complète
function recupCategoryById(PDO $db,int $categoryID):array|bool{
    $recup = "SELECT * FROM category_instrument where categoryID=?";
    $prepare = $db -> prepare($recup);
    try{
        $prepare->execute([$categoryID]);
    }catch(Exception $e){
        die($e->getMessage());
    }
    $bp = $prepare->fetch(PDO::FETCH_ASSOC);
    $prepare->closeCursor();
    return $bp;
}
