/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var initial_board = {
    a1:null,a2:null,a3:null,a4:null,
    b1:null,b2:null,b3:null,b4:null,
    c1:null,c2:null,c3:null,c4:null,
    d1:null,d2:null,d3:null,d4:null
};

function available_spaces(board){
    return Object.keys(board).filter(function(key){
        return board[key] == null
    });
}

function used_spaces(board){
    return Object.keys(board).filter(function(key){
        return board[key] !== null
    });
}

function score_board(board){
    return used_spaces(board).map(function(key){
        return (board[key].values.reduce(function(a, b) {
            return a + b; //sum tile values
        })) - board[key].values[0]; //don't count initial value
    }).reduce(function(a,b){return a+b}, 0);
}

function tile_value(tile){
    return tile ? tile.values[tile.values.length-1] : null;
}

function can_move(board){
    var new_board = [up,down,left,right].reduce(function(b, direction){
        return fold_board(b, direction);
    }, board);
    return available_spaces(new_board).length > 0
}

function same_board(board1, board2){
    return Object.keys(board1).reduce(function(ret, key){
        return ret && board1[key] == board2[key];
    }, true);
}

function fold_line(board, line){
    var tiles = line.map(function(key){
        return board[key];
    }).filter(function(tile){
         return tile !== null
    });   
    var new_tiles = [];
    if(tiles){
        //must loop so we can skip next if matched
        for(var i=0; i < tiles.length; i++){
           var tile = tiles[i];
           if(tile){
               var val = tile_value(tile);
               var next_tile = tiles[i+1];
                if(next_tile && val == tile_value(next_tile)){
                    //skip next tile;
                    i++;
                    new_tiles.push({
                        id: next_tile.id, //keep id
                        values: tile.values.concat([val * 2])
                    });
                }
                else{
                    new_tiles.push(tile);
                }
            }
        }
    }
    var new_line = {};
    line.forEach(function(key, i){
        new_line[key] = new_tiles[i] || null;
    });
    return new_line;
}

function fold_order(xs, ys, reverse_keys){
    return xs.map(function(x){
        return ys.map(function(y){
            var key = [x,y];
            if(reverse_keys){
                return key.reverse().join("");
            }
            return key.join("");
        });
    });
}

function fold_board(board, lines){
    
    //copy reference
    var new_board = board;
    lines.forEach(function(line){
        var new_line = fold_line(board, line);
        Object.keys(new_line).forEach(function(key){
            //mutate reference while building up board
            new_board = set_tile(new_board, key, new_line[key]);
        });
    });
    return new_board;
}

var tile_counter = 0;
function new_tile(initial){
    return {
        id: tile_counter++,
        values: [initial]
    };
}

function set_tile(board, where, tile){
    //do not destory the old board
    var new_board = {};
    Object.keys(board).forEach(function(key, i){
        //copy by reference for structual sharing
        new_board[key] = (key == where) ? tile : board[key];
    });
    return new_board;
}

var left = fold_order(["a","b","c","d"], ["1","2","3","4"], false);
var right = fold_order(["a","b","c","d"], ["4","3","2","1"], false);
var up = fold_order(["1","2","3","4"], ["a","b","c","d"], true);
var down = fold_order( ["1","2","3","4"], ["d","c","b","a"], true);

var GameBoard = React.createClass({
    getInitialState: function(){
        return {
            boards: [this.addTile(this.addTile(initial_board))]
        }
    },
    keyHandler:function(e){
        var directions = {
            37: left,
            38: up,
            39: right,
            40: down
        };
        
        if(directions[e.keyCode]
        && this.setBoard(fold_board(this.getBoard(), directions[e.keyCode]))
        && Math.floor(Math.random() * 30, 0) > 0){
            setTimeout(function(){
                 this.setBoard(this.addTile(this.getBoard()));
            }.bind(this), 100);
        }
    },
    setBoard:function(new_board){
        if(!same_board(this.getBoard(), new_board)){
            this.setState({
                boards: this.state.boards.concat([new_board])
            });
            return true;
        }
        return false;
    },
    getBoard:function(){
        return this.state.boards[this.state.boards.length-1];
    },
    addTile:function(board){
        //在棋盘中加棋子
        //找到没有棋子的地方
        var location = available_spaces(board).sort(function() {
          return .5 - Math.random();
        }).pop();
        //如果有空位
        if(location){
            //随机产生2或4
            var two_or_four = Math.floor(Math.random() * 2, 0) ? 2 : 4;
            //产生有棋子的棋盘
            return set_tile(board, location, new_tile(two_or_four));
        }
        return board;
    },
    newGame:function(){
        var aaa=this.getInitialState();
        console.log(aaa)
        this.setState(aaa);
    },
    undo:function(){
        if(this.state.boards.length>1){
            this.setState({
                boards: this.state.boards.slice(0, this.state.boards.length-2)
            })
        }
    },
    componentDidMount:function(){
        window.addEventListener("keydown", this.keyHandler, false);
    },
    render:function(){
        var board = this.getBoard();
        var status = !can_move(board)?" - Game Over!":"";
        return <div className="app">
            <span className="score">
                Score: {score_board(board)}{status}
            </span>
            <Tiles board={board}/>
            <button onClick={this.newGame}>New Game</button>
            <button onClick={this.undo}>Undo</button>
        </div>
    }
});

var Tiles = React.createClass({
    render: function(){
        var board = this.props.board;
        //sort board keys first to stop re-ordering of DOM elements
        var tiles = used_spaces(board).sort(function(a, b) {
            return board[a].id - board[b].id;
        });
        return <div className="board">{
            tiles.map(function(key){
                var tile = board[key];
                var val = tile_value(tile);
                return <span key={tile.id} className={key + " value" + val}>
                        {val}
                       </span>;
        })}</div>
    }
});
ReactDOM.render(
    <GameBoard />,
    document.getElementById('content')
);
