<?php

namespace Tests\Unit\ProblemSolving\Challenge3;

class Challenge3
{
    // [
    //     [42, 51, 22, 10,  0],
    //     [2,  50, 7,  6,   15],
    //     [4,  36, 8,  30,  20],
    //     [0,  40, 10, 100, 1]
    // ]

    // 42 -> 2 -> 4 -> 36 -> 8 -> 7 -> 6 -> 15 -> 20 -> 1

    //141

    // export const findLessCostPath = (board: number[][]): number => {
    // let result = 0;

    // if (board.length === 1 && board[0].length === 1) result = 0;

    // const path: { index: number; value: number }[] = [];

    // let acc = 0;
    // board.forEach((arr, i) => {
    //     arr.forEach((item, j) => {
    //     if (i === 0) {
    //         acc += item;

    //         if (arr[j + 1] <= board[i + 1][i]) {
    //         acc += arr[j + 1];
    //         } else {
    //         acc += board[i + 1][i];
    //         }
    //     }

    //     if (i === 0) {
    //         path.push({ index: j, value: item });
    //         return;
    //     }
    //     });
    // });

    // console.table(board);

    // return result;
    // };

    public static function findLessCostPath($board)
    {
        $result = 0;

        $verticalSize = count($board);
        $horizontalSize = count($board[0]);

        if ($verticalSize === 1 && $horizontalSize === 1) {
            return $result;
        }

        $sum = 0;
        $paths = [];
        foreach($board as $k => $values) {
            foreach($values as $kk => $value) {
                if ($k == 0) {
                    $sum += $value;

                    if ($values[$kk + 1] <= $board[$k + 1][$k]) {
                        $sum += $values[$kk + 1];
                    } else {
                        $sum += $board[$k + 1][$k];
                    }
                }

                if($k === 0) {
                    $path[] = ['index' => $kk, 'value' => $value];
                }


    //     if (i === 0) {
    //         acc += item;

    //         if (arr[j + 1] <= board[i + 1][i]) {
    //         acc += arr[j + 1];
    //         } else {
    //         acc += board[i + 1][i];
    //         }
    //     }

    //     if (i === 0) {
    //         path.push({ index: j, value: item });
    //         return;
    //     }

            }
        }
    }
}
