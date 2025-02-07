<?php
session_start();

// Classe représentant le plateau de jeu
class Board {
    public array $grid;

    public function __construct() {
        if (!isset($_SESSION['board'])) {
            $this->grid = array_fill(0, 3, array_fill(0, 3, ''));
            $_SESSION['board'] = $this->grid;
        } else {
            $this->grid = $_SESSION['board'];
        }
    }

    public function display(): void {
        echo "<div class='board'>";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $value = $this->grid[$i][$j];
                echo "<div class='cell'>";
                if ($value === '') {
                    echo "<form method='POST'>
                            <input type='hidden' name='row' value='$i'>
                            <input type='hidden' name='col' value='$j'>
                            <button type='submit' class='btn'></button>
                          </form>";
                } else {
                    echo "<span class='marker'>$value</span>";
                }
                echo "</div>";
            }
        }
        echo "</div>";
    }

    public function updateBoard(int $row, int $col, string $player): void {
        if ($this->grid[$row][$col] === '') {
            $this->grid[$row][$col] = $player;
            $_SESSION['board'] = $this->grid;
        }
    }

    public function checkWinner(): ?string {
        for ($i = 0; $i < 3; $i++) {
            if ($this->grid[$i][0] && $this->grid[$i][0] === $this->grid[$i][1] && $this->grid[$i][1] === $this->grid[$i][2]) {
                return $this->grid[$i][0];
            }
            if ($this->grid[0][$i] && $this->grid[0][$i] === $this->grid[1][$i] && $this->grid[1][$i] === $this->grid[2][$i]) {
                return $this->grid[0][$i];
            }
        }
        if ($this->grid[0][0] && $this->grid[0][0] === $this->grid[1][1] && $this->grid[1][1] === $this->grid[2][2]) {
            return $this->grid[0][0];
        }
        if ($this->grid[0][2] && $this->grid[0][2] === $this->grid[1][1] && $this->grid[1][1] === $this->grid[2][0]) {
            return $this->grid[0][2];
        }
        return null;
    }

    public function isFull(): bool {
        foreach ($this->grid as $row) {
            foreach ($row as $cell) {
                if ($cell === '') return false;
            }
        }
        return true;
    }

    public function reset(): void {
        $this->grid = array_fill(0, 3, array_fill(0, 3, ''));
        $_SESSION['board'] = $this->grid;
        $_SESSION['turn'] = 'X';
        $_SESSION['winner'] = null;
    }
}

// Classe représentant le jeu Tic-Tac-Toe
class Game {
    public Board $board;
    public string $currentTurn;
    public ?string $winner = null;

    public function __construct() {
        $this->board = new Board();
        if (!isset($_SESSION['turn'])) {
            $_SESSION['turn'] = 'X';
        }
        $this->currentTurn = $_SESSION['turn'];
        $this->winner = $_SESSION['winner'] ?? null;
    }

    public function play(int $row, int $col): void {
        if ($this->winner || $this->board->grid[$row][$col] !== '') return;

        $this->board->updateBoard($row, $col, $this->currentTurn);
        $this->winner = $this->board->checkWinner();
        $_SESSION['winner'] = $this->winner;

        if (!$this->winner && !$this->board->isFull()) {
            $_SESSION['turn'] = ($this->currentTurn === 'X') ? 'O' : 'X';
        }
    }

    public function resetGame(): void {
        $this->board->reset();
    }
}

// Gestion de la partie
$game = new Game();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset'])) {
        $game->resetGame();
        header("Location: job05.php");
        exit();
    }

    if (isset($_POST['row']) && isset($_POST['col'])) {
        $game->play((int)$_POST['row'], (int)$_POST['col']);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color:rgb(124, 122, 122);
        }
        h2 {
            color: #333;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 5px;
            margin: 20px auto;
            width: 310px;
        }
        .cell {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn {
            width: 100%;
            height: 100%;
            border: none;
            background: none;
            font-size: 24px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #ddd;
        }
        .marker {
            font-size: 36px;
            font-weight: bold;
        }
        .message {
            font-size: 20px;
            margin: 10px;
            color: green;
        }
        .draw {
            font-size: 20px;
            margin: 10px;
            color: orange;
        }
        .reset-btn {
            background-color: red;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Tic-Tac-Toe</h2>
    <p>Tour du joueur : <strong><?= $_SESSION['turn'] ?></strong></p>

    <?php $game->board->display(); ?>

    <?php if ($game->winner): ?>
        <p class="message">🎉 Joueur <?= $game->winner ?> a gagné !</p>
    <?php elseif ($game->board->isFull()): ?>
        <p class="draw">🤝 Match nul !</p>
    <?php endif; ?>

    <form method="POST">
        <button type="submit" name="reset" class="reset-btn">Rejouer</button>
    </form>
</body>
</html>
