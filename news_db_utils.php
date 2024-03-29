<?php
class NewsDBUtils extends dbConnect
{
    public function getTeRejat()
    {
        $query = "SELECT * FROM te_rejat";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./index.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function filterByArticleType($item, $article_type)
    {
        return $item['lloji_i_lajmit'] == $article_type;
    }
}