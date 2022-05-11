import React from "react";

export default class Spinner extends React.Component {
    render() {
        return (
            <div className="d-flex justify-content-center">
                <div className="spinner-border" role="status">
                    <span className="visually-hidden">Načítání...</span>
                </div>
            </div>
        );
    }
}
