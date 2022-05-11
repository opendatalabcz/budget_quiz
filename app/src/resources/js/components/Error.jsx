import React from "react";

export default class Error extends React.Component {
    render() {
        return (
            <div className="alert alert-danger" role="alert">
                <p>
                    Error: {this.props.error} <br />
                    Prosím načtěte stránku znovu
                </p>
            </div>
        );
    }
}
