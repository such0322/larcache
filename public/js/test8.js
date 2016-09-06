/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

var T12=React.createClass({
    submitHandler:function(event){
        event.preventDefault();
        var helloTo=this.refs.helloTo.value;
        console.log(helloTo);
    },
    render:function(){
        return (<form onSubmit={this.submitHandler}>
                <input ref="helloTo" type="text" defaultValue="hello world!" />
                <br/>
                <button type ="submit">Speak</button>
                </form>)
    }
});


var T13=React.createClass({
    getInitialState:function(){
        return {
            helloTo:"hello world",
        }
    },
    handleChange:function(event){
        this.setState({helloTo:event.target.value.toUpperCase()})
    },
    submitHandler:function(event){
        event.preventDefault();
        console.log(this.state.helloTo)
    },
    render:function(){
        return(<form onSubmit={this.submitHandler}>
                <input type="text" value={this.state.helloTo} onChange={this.handleChange} />
                <br />
                <button type="submit">Speak</button>
               </form>)
    }
    
})


var T14 =React.createClass({
    
    getInitialState:function(){
        return {
            options:["B"]
        };
    },
    handleChange:function(event){
        var checked=[]
        var sel=event.target;
        for(var i=0; i<sel.length; i++){
            var option=sel.options[i];
            if(option.selected){
                checked.push(option.value)
            }
        }
        this.setState({
            options:checked
        })
    },
    submitHandler:function(event){
        event.preventDefault();
        console.log(this.state.options)
    },
    render:function(){
        return(
        <form onSubmit={this.submitHandler}>
            <select multiple="true" value={this.state.options} onChange={this.handleChange}>
                <option value="A">First Option</option>
                <option value="B">Second Option</option>
                <option value="C">Third Option</option>
            </select>
            <br/>
            <button type="submit">Speak</button>
        </form>
        )
    }
    
});

var T15=React.createClass({
    submitHandler:function(event){
        event.preventDefault();
        console.log(this.refs.checked.checked);
        
    },
    render:function(){
        return(<form onSubmit={this.submitHandler}>
            <input ref="checked" type="checkbox" value="A" defaultChecked="true" />
            <br/>
            <button type="submit">Speak</button> 
       </form>)
    }
})

var T16 =React.createClass({
    getInitialState:function(){
        return{
            checked:true
        };
    },
    handleChange:function(event){
        this.setState({
            checked:event.target.checked
        })
    },
    submitHandler:function(event){
        event.preventDefault();
        console.log(this.state.checked)
    },
    render:function(){
        return(<form onSubmit={this.submitHandler}>
                <input type="checkbox" value="A" checked={this.state.checked} onChange={this.handleChange} />
                <br/>
                <button type="submit">btn</button>
        </form>)
    }
})

var T17=React.createClass({
    getInitialState:function(){
        return {
            radio:"B"
        }
    },
    handleChange:function(event){
        this.setState({
            radio:event.target.value
        })
    },
    submitHandler:function(event){
        event.preventDefault();
        console.log(this.state.radio)
    },
    render:function(){
        return(
        <form onSubmit={this.submitHandler}>
            <input type="radio" value="A" checked={this.state.radio=="A"} onChange={this.handleChange} />A
            <br />
            <input type="radio" value="B" checked={this.state.radio=="B"} onChange={this.handleChange} />B
            <br />
            <button type="submit">btn</button>
        </form>
        )
    }
})

var T18=React.createClass({
    getInitialState:function(){
        return {
            given_name:"",
            family_name:"",
        }
    },
    handleChange:function(name,event){
        var newState={}
        newState[name]=event.target.value;
        this.setState(newState)
    },
    submitHandler:function(event){
        event.preventDefault();
        console.log(this.state)
    },
    render:function (){
        return(<form onSubmit={this.submitHandler}>
            <label htmlFor="given_name">Given Name:</label>
            <br/>
            <input type="text" name="given_name" value={this.state.given_name} onChange={this.handleChange.bind(this,"given_name")} />
            <br/>
            <label htmlFor="family_name">Family Name:</label>
            <br/>
            <input type="text" name="family_name" value={this.state.family_name} onChange={this.handleChange.bind(this,"family_name")} />
            <br/>
            <button className="btn btn-default" type="submit">btn</button>
        </form>)
    }
})

var T19=React.createClass({
    mixins:[React.addons.LinkedStateMixin],
    getInitialState:function(){
        return{
            given_name:"",
            family_name:""
        }
    },
    submitHandler:function(event){
        event.preventDefault();
        var words=[
            "Hi",this.state.given_name,this.State.family_name
        ];
        console.log(words.join(" "))
    },
    render:function(){
        return (
            <form onSubmit={this.submitHandler}>
                <label htmlFor="given_name">given name:</label>
                <br/>
                <input type="text" name="given_name" valueLink={this.linkState('given_name')} />
                <br />
                <label htmlFor="family_name">family name:</label>
                <br/>
                <input type="text" name="family_name" valueLink={this.linkState('family_name')} />
                <br />
                <button type="submit">btn</button>
            </form>
        )
    }
})


ReactDOM.render(
        <T19 /> ,
        d.getElementById('content')
);
