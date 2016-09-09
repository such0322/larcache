/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

var Article=React.createClass({
    render:function(){
        return (<div className="col-sm-12" style={{marginBottom:"10px"}} >
                    <div className="col-sm-2">
                        <button className="btn btn-default col-sm-12">up</button>
                        <button className="btn btn-default col-sm-12">down</button>
                    </div>
                    <div className="col-sm-9">
                        <h4>{this.props.data.title}</h4>
                        <p></p>
                    </div>
                    <div className="col-sm-1">
                        <button type="button" className="btn btn-default pull-right">{this.props.data.votes}</button>
                        <button type="button" className="btn btn-default pull-right">
                            <span className="glyphicon glyphicon-record"></span>
                        </button>
                    </div>
                </div>)
    }
})

var List=React.createClass({
    getInitialState: function () {
        return {data: []};
    },
    componentDidMount:function(){
        this.getDataFromServer();
    },
    getDataFromServer:function(){
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({data: data});
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    render:function(){
        var node=this.state.data.map(function(article,ko){
            return (<Article data={article} key={ko} />)
        });
        return (<div className="col-sm-12">{node}</div>)
    }
})


ReactDOM.render(
        <List url="/larcache/public/blog/api/articlelist/1" />,
        document.getElementById('content')
);