import React from "react";
import BudgetStateChange from "./BudgetStateChange";

export default class Question extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            selected_answer: null
        }

        // binding
        this.selectAnswer = this.selectAnswer.bind(this)
    }

    selectAnswer(answer_id, budget_state_change) {
        this.setState({
            selected_answer: answer_id
        });

        this.props.onSelectAnswer(answer_id, budget_state_change);
    }

    render() {
        return (
            <div className="question">
                <h2>Otázka číslo {this.props.question.number} – {this.props.question.title}</h2>
                <p>{this.props.question.description}</p>

                <div className="answers list-group">
                    {this.props.question.answers.map((answer) => {
                        let classes = "list-group-item list-group-item-action mb-3";

                        if (answer.id === this.state.selected_answer) {
                            classes += " border-primary";
                        }

                        return (
                            <a href="#" key={answer.id} className={classes}
                               onClick={(event) => {
                                   this.selectAnswer(answer.id, answer.budget_state_change);
                                   event.preventDefault();
                               }}>
                                <div className="row">
                                    <div className="col-md-6">
                                        <h4>{answer.title}</h4>
                                        <p>{answer.description}</p>
                                    </div>
                                    <div className="col-md-6">
                                        {answer.budget_state_change &&
                                            <BudgetStateChange signFormatter={this.props.signFormatter} budget_state_change={answer.budget_state_change} />
                                        }
                                    </div>
                                </div>
                            </a>
                        );
                    })}
                </div>
            </div>
        );
    }
}
