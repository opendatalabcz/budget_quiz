import React from "react";

export default class BudgetStateChange extends React.Component {
    render() {
        return (
            <div className="budget-state-change">
                <h5>Kapitola rozpočtu</h5>
                <p>{this.props.budget_state_change.budget_chapter.name}</p>

                {this.props.budget_state_change.income_first_year !== 0 &&
                    <div>
                        <h6>Změna příjmů pro rok 2022</h6>
                        <p>{this.props.signFormatter.format(this.props.budget_state_change.income_first_year)}</p>
                    </div>
                }

                {this.props.budget_state_change.income_second_year !== 0 &&
                    <div>
                        <h6>Změna příjmů pro rok 2023</h6>
                        <p>{this.props.signFormatter.format(this.props.budget_state_change.income_second_year)}</p>
                    </div>
                }

                {this.props.budget_state_change.income_third_year !== 0 &&
                    <div>
                        <h6>Změna příjmů pro rok 2024</h6>
                        <p>{this.props.signFormatter.format(this.props.budget_state_change.income_third_year)}</p>
                    </div>
                }

                {this.props.budget_state_change.expense_first_year !== 0 &&
                    <div>
                        <h6>Změna výdajů pro rok 2022</h6>
                        <p>{this.props.signFormatter.format(this.props.budget_state_change.expense_first_year)}</p>
                    </div>
                }

                {this.props.budget_state_change.expense_second_year !== 0 &&
                    <div>
                        <h6>Změna výdajů pro rok 2023</h6>
                        <p>{this.props.signFormatter.format(this.props.budget_state_change.expense_second_year)}</p>
                    </div>
                }

                {this.props.budget_state_change.expense_third_year !== 0 &&
                    <div>
                        <h6>Změna výdajů pro rok 2024</h6>
                        <p>{this.props.signFormatter.format(this.props.budget_state_change.expense_third_year)}</p>
                    </div>
                }
            </div>
        );
    }
}
