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


var T10= React.createClass({

    propTypes:{
        id:React.PropTypes.string,
        name:React.PropTypes.string.isRequired,
        label:React.PropTypes.string.isRequired,
        value:React.PropTypes.string.isRequired,
        checked:React.PropTypes.bool,
        
    },
    getDefaultProps:function(){
        return {
            id:null,
            checked:false,
            name:"aaa",
            label:"this is label",
            value:"abc"
        }
    },
    getInitialState:function(){
        var id=this.props.id ? this.props.id:("radio-1");
        return {
            checked:!this.props.checked,
            id:id,
            name:id
        }
    },
    render:function(){
        return (<div className="radio">
                    <label htmlFor={this.props.id}>
                        <input type="radio" 
                            name={this.props.name}
                            id={this.props.id}
                            value={this.props.value}
                            checked={this.state.checked} />
                        {this.props.label}
                    </label>
                </div>)
    }
})



ReactDOM.render(
        <T10 />,
        d.getElementById('content')
)


