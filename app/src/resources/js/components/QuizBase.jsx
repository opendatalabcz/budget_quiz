import React from 'react';
import Error from "./Error";
import Spinner from "./Spinner";
import Questionnaire from "./Questionnaire";
import Quiz from "./Quiz";

export default class QuizBase extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            hash: null,
            data: null,
            error: null
        };

        // binding

        this.error = this.error.bind(this);
        this.hashUpdated = this.hashUpdated.bind(this);
    }

    componentDidMount() {
        window.axios.get('/api/quiz/data')
            .then((response) => {
                this.setState({
                    data: {
                        educations: response.data.educations,
                        parties: response.data.parties,
                        questions: response.data.questions,
                        regions: response.data.regions,
                        budget_states: response.data.budget_states
                    }
                })
            })
            .catch((error) => {
                error("Komunikace se serverem se nezdařila");
            });
    }

    error(err) {
        this.setState({
            error: err
        });
    }

    hashUpdated(hash) {
        this.setState({
            hash: hash
        });
    }

    render() {
        if (this.state.error) {
            return <Error error={this.state.error}/>
        } else if (!this.state.data) {
           return <Spinner />;
        } else if (!this.state.hash) {
            return <Questionnaire educations={this.state.data.educations}
                                  parties={this.state.data.parties}
                                  regions={this.state.data.regions}
                                  onError={this.error}
                                  onSubmitted={this.hashUpdated} />;
        } else {
            return <Quiz questions={this.state.data.questions}
                         budget_states={this.state.data.budget_states}
                         hash={this.state.hash}
                         onError={this.error} />;
        }
    }
}
