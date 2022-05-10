import React from "react";

export default class BudgetSimulation extends React.Component {
    render() {
        const change_first_year = { income: null, expense: null };
        const change_second_year = { income: null, expense: null };
        const change_third_year = { income: null, expense: null };

        if (this.props.current_budget_state_change !== null) {
            change_first_year.income = this.props.current_budget_state_change.income_first_year;
            change_first_year.expense = this.props.current_budget_state_change.expense_first_year;

            change_second_year.income = this.props.current_budget_state_change.income_second_year;
            change_second_year.expense = this.props.current_budget_state_change.expense_second_year;

            change_third_year.income = this.props.current_budget_state_change.income_third_year;
            change_third_year.expense = this.props.current_budget_state_change.expense_third_year;
        }

        return (
          <div className="simulation">
              <table className="table table-hover">
                  <thead>
                      <tr>
                        <th>Rok</th>
                        <th>Příjmy</th>
                        <th>Výdaje</th>
                        <th>Výsledek rozpočtu</th>
                      </tr>
                  </thead>
                  <tbody>
                      <BudgetSimulationRow year="2022"
                                           income={this.props.budget.income_first_year}
                                           expense={this.props.budget.expense_first_year}
                                           change={change_first_year}
                                           formatter={this.props.formatter}
                                           signFormatter={this.props.signFormatter} />

                      <BudgetSimulationRow year="2023"
                                           income={this.props.budget.income_second_year}
                                           expense={this.props.budget.expense_second_year}
                                           change={change_second_year}
                                           formatter={this.props.formatter}
                                           signFormatter={this.props.signFormatter} />
                      <BudgetSimulationRow year="2024"
                                           income={this.props.budget.income_third_year}
                                           expense={this.props.budget.expense_third_year}
                                           change={change_third_year}
                                           formatter={this.props.formatter}
                                           signFormatter={this.props.signFormatter} />
                  </tbody>
              </table>
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
            <tr>
                <td>{this.props.year}</td>
                <td>
                    <p>{this.props.formatter.format(this.props.income)}</p>
                    {this.props.change.income &&
                        <p className="text-primary">{this.props.signFormatter.format(this.props.change.income)}</p>
                    }
                </td>
                <td>
                    <p>{this.props.formatter.format(this.props.expense)}</p>
                    {this.props.change.expense &&
                        <p className="text-primary">{this.props.signFormatter.format(this.props.change.expense)}</p>
                    }
                </td>
                <td>
                    <p>{this.props.formatter.format(result)}</p>

                    {this.props.change.expense &&
                        <p className="text-primary">{this.props.signFormatter.format(result + change_result)}</p>
                    }
                </td>
            </tr>
        );
    }
}
