/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//ReactDOM.render(
//    <GameBoard />,
//    document.getElementById('content')
//);
var d=document;
var surveys=[{title:"Superheroes"}]

var T8=React.createClass({
    render:function(){
        console.log(this.props)
        return (<div>
                aaa
                </div>)
    }
})


var T9=React.createClass({
    getInitialState:function(){
        return {
            showOptions:false
        }
    },
    
    render:function(){
        var options;
        if(this.state.showOptions){
            options=(
                    <ul className="options">
                        <li>United State of America</li>
                        <li>New zealand</li>
                        <li>Denmark</li>
                    </ul>
                    )
        }
        
        return (<div className="dropdown" onClick={this.handleClick}>
                    <lable> choose a country</lable>.{options}
                </div>)
    },
    
    handleClick:function(){
        this.setState({
            showOptions:true
        })
    }
    
})




ReactDOM.render(
        <T9 />,
        d.getElementById('content')
)


