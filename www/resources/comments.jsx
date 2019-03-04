var Comment = React.createClass({
    render: function () {
        var deleteBtn =
            this.props.canDelete
                ? <button type="submit" onClick={this.props.delete}>Delete</button>
                : null; // null: ingen knapp om vi inte får ta bort den

        return <div className="comment">
            <p>{this.props.content}</p> {/* vi laddar attributet content från klassen som använder taggen */}
            <p>Posted by {this.props.user}</p>
            <p>{this.props.date}</p>
            {deleteBtn}

        </div>;
    },
});

var Comments = React.createClass({ // klasskomponent
    render: function () {
        var self = this;

        var reComments = [];
        for (var i = 0; i < this.state.comments.length; i++) {
            var comment = this.state.comments[i];
            reComments.push(<Comment delete={function () {
                self.deleteComment(comment.id)
            }} {...comment}/>);
        }

        return <div>
            <div>
                <textarea onChange={this.newCommentTextChanged} value={this.state.newCommentText} cols="90" rows="6"/>
            </div>
            <button onClick={this.postComment}>Post</button>
            {reComments}
        </div>;
    },

    getInitialState: function () {
        this.refresh();
        return { // viewmodel
            comments: [],
            newCommentText: "",
        };
    },

    refresh: function () {
        var self = this;

        $.getJSON("/TastyRecipe/View/ViewRecipeCommentsJSON?title=" + this.props.recipeTitle,
            function (comments) {
                self.setState({
                    comments: comments
                });
            });
    },

    deleteComment: function (id) {
        var self = this;

        $.post("/TastyRecipe/View/DeleteComment", {recipe: this.props.recipeTitle, commentID: id}, function () {
            self.refresh();
        })
    },

    // Manuell tvåvägs-binding
    newCommentTextChanged: function (ev) {
        this.setState({
            newCommentText: ev.target.value
        });
    },

    postComment: function () {
        var self = this;

        $.post("/TastyRecipe/View/PostComment", {
            recipe: this.props.recipeTitle,
            content: this.state.newCommentText
        }, function () {
            self.setState({
                newCommentText: "" // Nollställ kommentarsfältet
            }, function () {
                self.refresh();
            });
        });
    }
});

(function () {
    var target = document.getElementById('commentsection');
    ReactDOM.render( // jsx syntax, xmlliknande
        <Comments recipeTitle={target.dataset.forRecipe}/>,
        target
    );
})();