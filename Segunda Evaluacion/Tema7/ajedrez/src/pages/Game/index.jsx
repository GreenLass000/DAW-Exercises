import {useEffect, useRef, useState} from "react";
import Chess from "chess.js";
import {createBoard} from "../../functions";

/**
 * Forsyth-Edwards Notation
 *
 * r -> rook
 *
 * n -> knight
 *
 * b -> bishop
 *
 * q -> queen
 *
 * k -> king
 *
 * p -> pawn
 *
 * / -> Siguiente linea
 *
 * 8-> 8 celdas vacias
 *
 * Mayus diferencia los jugadores
 *
 * @type {string}
 */
const FEN = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
const Game = () => {
    const [fen, setFen] = useState(FEN);
    const {current: chess} = useRef(new Chess(fen));
    const [board, setBoard] = useState(createBoard(fen));

    useEffect(() => {
        setBoard(createBoard(fen))
    }, [fen]);

    return (
        <div className={"game"}>
            <Board cells={board}/>
        </div>
    );
};

export default Game;