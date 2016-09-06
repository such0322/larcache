/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var init_board = {
    a1:null,a2:null,a3:null,a4:null,
    b1:null,b2:null,b3:null,b4:null,
    c1:null,c2:null,c3:null,c4:null,
    d1:null,d2:null,d3:null,d4:null
};

var abc={aa:null,bb:null,cc:null,dd:null,
    aa1:null,bb1:null,cc1:null,dd1:null};

function available_spaces(board){
    return Object.keys(board).filter(function(key){
        return board[key] == null
    });
}

function set_qz(board,loc,tof){
    var nboard={}
    Object.keys(board).forEach(function(ko,i){
        nboard[ko]= (ko==loc)?tof:board[ko]
    })
    return nboard
//    board[loc]=tof;
//    console.log(board)
//    return board
}

function set_t(board,loc,tof){
    board[loc]=tof;
    return board
}

console.log(aaa)
set_t(abc,"a1",2);


var GameJM = React.createClass({
    getDefaultProps:function(){
        return {board:init_board}
    },
    getInitialState:function(){
        //初始化棋盘
//        return {board:this.addQz(this.addQz(this.props.board))};
        var board=set_t(abc,"a1",2);
        return {board:board}
    },
    addQz:function(board){
        //去除有值的 todo,获得空位,随机一个
        var location=available_spaces(board).sort(function() {
           return .5 - Math.random();
        }).pop();
        
        //产生一个2/4的棋子,加入棋子
        return set_t(board,location,2);
//        return board
    },
    addQz_bak:function(board){
        //去除有值的 todo,获得空位,随机一个
        var location=available_spaces(board).sort(function() {
           return .5 - Math.random();
        }).pop();
        
        //产生一个2/4的棋子,加入棋子
        var two_or_four = Math.floor(Math.random() * 2, 0) ? 2 : 4;
        return set_qz(board,location,two_or_four);
//        return board
    },
    newGame:function(){
        var aaa=this.getInitialState();
        this.setState(aaa)
    },
    newGame2:function(){
        var aaa=this.getInitialState();
        this.setState(aaa)
    },
    getBoard:function(){
        return this.state.board;
    },
    render:function(){
        var board=this.getBoard();
        return (<div className="app">
                <span className="score">score:0</span>
                <Qis board={board} />
                <button onClick={this.newGame2} >NewGame</button>
                <button>Undo </button>
                </div>)
    }
})

var Qis=React.createClass({
    
    render:function(){
        var board= this. props.board;
        //获取不为空的棋子
        var used_qz=[]
        for(var i in board){
            if(board[i]!==null)
                used_qz.push(i)
        }
        
        return (<div className="board">{
                    used_qz.map(function(ko,vo){
                        return (<span key={vo} className={ko+" value"+board[ko]}>{board[ko]}</span>)
                    })
                }</div>)
    }
});

//ReactDOM.render(
//        <GameJM  />,
//        document.getElementById('content2')
//);


