<?php
include __DIR__ ."/vendor/autoload.php";
use Tigo\Lottery\LotteryBr;

/**
 * Game
 * @author Tiago A C Pereira 
 */
class Game 
{    
    
    /**
     * instance
     *
     * @var LotteryBr
     */
    protected $lot;  

    /**
     * ticket
     *
     * @var array
     */
    public $ticket = [];

    public function __construct()
    {
        $this->lot = new LotteryBr(); 
    }
    
    public function make($game, $scorer, $qtd)
    {
        switch($game){
            case 1:
                $this->ticket = $this->lot->megaSena($scorer,$qtd);
                break;
            case 2:
                $this->ticket = $this->lot->quina($scorer,$qtd);
                break;  
            case 3:
                $this->ticket = $this->lot->lotoFacil($scorer,$qtd);
                break;
            case 4:
                $this->ticket = $this->lot->LotoMania($scorer,$qtd);
                break;             
            default:
                echo "<div class='alert alert-danger'>Jogo não selecionado</div>";
                break;
        }
    }

}

$game = new Game();
$game->make($_POST['game'], $_POST['scorer'], $_POST['ticket']);
foreach ($game->ticket as $key1 => $item1) {
    echo "<h5><label class='rounded border text-danger'>".($key1+1).".ª Cartela</label></h5>";
    echo "<h5>";
    $i = 0;
    foreach ($item1 as $key2 => $value) {
        $i += 1;
        if($i > 10){
            echo "<br><br>";
            $i = 1;
        }
        echo "<span class='rounded border border-primary '>".$value."</span>&nbsp";      
    }
    echo "</h5><hr>";
}
