import React from "react";
import Question from "./Question";
import BudgetSimulation from "./BudgetSimulation";

export default class Quiz extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            current_question: 0,
            selected_answer: null,
            next_question_btn_text: 'Další otázka',
            current_budget_state_change: null,
            budget: {
                income_first_year: this.props.budget_states.reduce((prev, state) => {
                    return prev + state.income_first_year
                }, 0),
                income_second_year: this.props.budget_states.reduce((prev, state) => {
                    return prev + state.income_second_year
                }, 0),
                income_third_year: this.props.budget_states.reduce((prev, state) => {
                    return prev + state.income_third_year
                }, 0),
                expense_first_year: this.props.budget_states.reduce((prev, state) => {
                    return prev + state.expense_first_year
                }, 0),
                expense_second_year: this.props.budget_states.reduce((prev, state) => {
                    return prev + state.expense_second_year
                }, 0),
                expense_third_year: this.props.budget_states.reduce((prev, state) => {
                    return prev + state.expense_third_year
                }, 0)
            },
            error_message: null
        };

        // binding
        this.selectAnswer = this.selectAnswer.bind(this);
        this.submitAnswer = this.submitAnswer.bind(this);
    }

    selectAnswer(answer_id, budget_state_change) {
        this.setState({
            selected_answer: answer_id,
            current_budget_state_change: budget_state_change
        });
    }

    submitAnswer(event) {
        event.preventDefault();

        if (!this.state.selected_answer) {
            this.setState({
                error_message: "Musíte vybrat odpověď před pokračováním"
            });

            return;
        }

        event.target.disabled = true;
        this.setState({
            next_question_btn_text: (
               <span>
                   <span className="spinner-border spinner-border-sm" role="status" aria-hidden="true" />&nbsp;Načítání
               </span>
            ),
            error_message: null
        });

        window.axios.post('/api/quiz/answer', {
            hash: this.props.hash,
            question_id: this.props.questions[this.state.current_question].id,
            answer_id: this.state.selected_answer
        }).then((response) => {
            if (response.data.is_finished) {
                window.location.href = '/results/' + response.data.quiz_id;
            } else {
                let income_first_year_change = 0;
                let income_second_year_change = 0;
                let income_third_year_change = 0;
                let expense_first_year_change = 0;
                let expense_second_year_change = 0;
                let expense_third_year_change = 0;

                if (this.state.current_budget_state_change) {
                    const state_coefficient = this.state.current_budget_state_change.is_increase ? 1 : -1;

                    if (this.state.current_budget_state_change.is_expense) {
                        expense_first_year_change = state_coefficient * this.state.current_budget_state_change.first_year;
                        expense_second_year_change = state_coefficient * this.state.current_budget_state_change.second_year;
                        expense_third_year_change = state_coefficient * this.state.current_budget_state_change.third_year;
                    } else {
                        income_first_year_change = state_coefficient * this.state.current_budget_state_change.first_year;
                        income_second_year_change = state_coefficient * this.state.current_budget_state_change.second_year;
                        income_third_year_change = state_coefficient * this.state.current_budget_state_change.third_year;
                    }
                }

                this.setState((state, _) => ({
                    current_question: state.current_question + 1,
                    selected_answer: null,
                    next_question_btn_text: (state.current_question + 1 === this.props.questions.length - 1) ? 'Dokončit' : 'Další otázka',
                    current_budget_state_change: null,
                    budget: {
                        income_first_year: state.budget.income_first_year + income_first_year_change,
                        income_second_year: state.budget.income_second_year + income_second_year_change,
                        income_third_year: state.budget.income_third_year + income_third_year_change,
                        expense_first_year: state.budget.expense_first_year + expense_first_year_change,
                        expense_second_year: state.budget.expense_second_year + expense_second_year_change,
                        expense_third_year: state.budget.expense_third_year + expense_third_year_change
                    }
                }))
            }
        }).catch((_) => {
            this.props.onError('Nepodařila se komunikace se serverem');
        });
    }

    render() {
        const question = this.props.questions[this.state.current_question];

        const formatter = Intl.NumberFormat('cs', {
            notation: 'compact',
            style: 'currency',
            currency: 'CZK',
            maximumFractionDigits: 3
        });

        return (
            <div className="quiz">
                <Question question={question} onSelectAnswer={this.selectAnswer} formatter={formatter}/>

                {this.state.error_message && (
                    <div className="error_message alert alert-danger">
                        {this.state.error_message}
                    </div>
                )}

                <a href="#" className="btn btn-primary mb-5" onClick={this.submitAnswer}>{this.state.next_question_btn_text}</a>

                <BudgetSimulation budget={this.state.budget}
                                  current_budget_state_change={this.state.current_budget_state_change}
                                  formatter={formatter} />
            </div>
        );
    }
}
