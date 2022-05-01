import React from "react";

export default class BudgetStateChange extends React.Component {
    render() {
        return (
            <div className="budget-state-change">
                <h5>Kapitola rozpočtu</h5>
                <p>{this.props.budget_state_change.budget_chapter.name}</p>

                <h6>Změna {this.props.budget_state_change.is_expense ? 'výdajů' : 'příjmů'}</h6>

                <h6>První rok</h6>
                <p>{this.props.budget_state_change.is_increase ? '+' : '-'} {this.props.formatter.format(this.props.budget_state_change.first_year)}</p>

                <h6>Druhý rok</h6>
                <p>{this.props.budget_state_change.is_increase ? '+' : '-'} {this.props.formatter.format(this.props.budget_state_change.second_year)}</p>

                <h6>Třetí rok</h6>
                <p>{this.props.budget_state_change.is_increase ? '+' : '-'} {this.props.formatter.format(this.props.budget_state_change.third_year)}</p>
            </div>
        );
    }
}
