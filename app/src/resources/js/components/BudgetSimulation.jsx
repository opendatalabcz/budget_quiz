import React from "react";

export default class BudgetSimulation extends React.Component {
    render() {
        const change_first_year = { income: null, expense: null };
        const change_second_year = { income: null, expense: null };
        const change_third_year = { income: null, expense: null };

        if (this.props.current_budget_state_change !== null) {
            const state_coefficient = this.props.current_budget_state_change.is_increase ? 1 : -1;

            if (this.props.current_budget_state_change.is_expense) {
                change_first_year.expense = state_coefficient * this.props.current_budget_state_change.first_year;
                change_second_year.expense = state_coefficient * this.props.current_budget_state_change.second_year;
                change_third_year.expense = state_coefficient * this.props.current_budget_state_change.third_year;

            } else {
                change_first_year.income = state_coefficient * this.props.current_budget_state_change.first_year;
                change_second_year.income = state_coefficient * this.props.current_budget_state_change.second_year;
                change_third_year.income = state_coefficient * this.props.current_budget_state_change.third_year;
            }
        }

        return (
          <div className="simulation">
              <h4>První rok</h4>
              <BudgetSimulationRow income={this.props.budget.income_first_year}
                                   expense={this.props.budget.expense_first_year}
                                   change={change_first_year}
                                   formatter={this.props.formatter} />

              <h4>Druhý rok</h4>
              <BudgetSimulationRow income={this.props.budget.income_second_year}
                                   expense={this.props.budget.expense_second_year}
                                   change={change_second_year}
                                   formatter={this.props.formatter} />

              <h4>Třetí rok</h4>
              <BudgetSimulationRow income={this.props.budget.income_third_year}
                                   expense={this.props.budget.expense_third_year}
                                   change={change_third_year}
                                   formatter={this.props.formatter} />
          </div>
        );
    }
}

class BudgetSimulationRow extends React.Component {
    render() {
        const result = this.props.income - this.props.expense;
        let change_result = null;

        if (this.props.change.income) {
            change_result = this.props.change.income;
        }

        if (this.props.change.expense) {
            change_result -= this.props.change.expense;
        }

        return (
            <div className="row">
                <div className="col-md-4">
                    <h5>Příjmy</h5>
                    <p>{this.props.formatter.format(this.props.income)}</p>

                    {this.props.change.income &&
                        <p className="change">{this.props.formatter.format(this.props.change.income)}</p>
                    }
                </div>
                <div className="col-md-4">
                    <h5>Výdaje</h5>
                    <p>{this.props.formatter.format(this.props.expense)}</p>

                    {this.props.change.expense &&
                        <p className="change">{this.props.formatter.format(this.props.change.expense)}</p>
                    }
                </div>
                <div className="col-md-4">
                    <h5>Stav rozpočtu</h5>
                    <p>{this.props.formatter.format(result)}</p>

                    {this.props.change.expense &&
                        <p className="change">{this.props.formatter.format(result + change_result)}</p>
                    }
                </div>
            </div>
        );
    }
}
