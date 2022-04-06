<?php
abstract class Model
{
    protected function executeRequest($sql, $params = null)
    {
        $db = new PDO(
            'mysql:host=localhost;dbname=test;charset=utf8',
            'root', ''
        );
        try {
            if ($params == null) {              // exécution directe
                $result = $db->query($sql);
            } else {                            // requête préparée
                $result = $db->prepare($sql);
                $result->execute($params);
            }
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        
    }
}
