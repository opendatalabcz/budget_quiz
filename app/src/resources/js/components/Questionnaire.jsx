import React from "react";

export default class Questionnaire extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            quiz_age: '',
            quiz_region: (props.regions.length > 0) ? props.regions[0].id : '',
            quiz_education: (props.educations.length > 0) ? props.educations[0].id : '',
            quiz_party: (props.parties.length > 0) ? props.parties[0].id : '',
            submit_btn: 'Přejít ke kvízu',
            validation_errors: {}
        };

        // binding
        this.handleInputChange = this.handleInputChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleInputChange(event) {
        // source: https://reactjs.org/docs/forms.html
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;
        this.setState({
            [name]: value
        });
    }

    handleSubmit(event) {
        document.getElementById('questionnaire-submit-btn').disabled = true;

        this.setState({
            submit_btn: (
                <span>
                   <span className="spinner-border spinner-border-sm" role="status" aria-hidden="true" />&nbsp;Načítání
               </span>
            )
        });

        window.axios.post('/api/quiz/create', {
            quiz_age: this.state.quiz_age,
            quiz_region: this.state.quiz_region,
            quiz_education: this.state.quiz_education,
            quiz_party: this.state.quiz_party
        }).then((response) => {
            this.setState({
                validation_errors: {}
            });

            this.props.onSubmitted(response.data.hash);
        }).catch((error) => {
            if (error.response && error.response.status === 422) { // validation errors
                this.setState({
                    validation_errors: error.response.data.errors
                })
            } else {
                this.props.onError(error);
            }

            this.setState({
                submit_btn: 'Přejít ke kvízu'
            });

            document.getElementById('questionnaire-submit-btn').disabled = false;
        });

        event.preventDefault();
    }

    render() {
        let classAge = 'form-control';
        let classRegion = 'form-select';
        let classEducation = 'form-select';
        let classParty = 'form-select';

        if ('quiz_age' in this.state.validation_errors) {
            classAge += ' is-invalid';
        }

        if ('quiz_region' in this.state.validation_errors) {
            classRegion += ' is-invalid';
        }

        if ('quiz_education' in this.state.validation_errors) {
            classEducation += ' is-invalid';
        }

        if ('quiz_party' in this.state.validation_errors) {
            classParty += ' is-invalid';
        }

        return (
            <form className="questionnaire" onSubmit={this.handleSubmit}>
                <div className="mb-3">
                    <label htmlFor="quiz-age-input" className="form-label">Vyplňte Váš věk</label>
                    <input name="quiz_age"
                           type="number"
                           id="quiz-age-input"
                           className={classAge}
                           value={this.state.quiz_age}
                           onChange={this.handleInputChange}
                           min="0" max="150" required />
                    {'quiz_age' in this.state.validation_errors &&
                        <div className="invalid-feedback">
                            {this.state.validation_errors['quiz_age'][0]}
                        </div>
                    }
                </div>

                <div className="mb-3">
                    <label htmlFor="quiz-region-input" className="form-label">Zvolte kraj, ve kterém bydlíte</label>
                    <select name="quiz_region" id="quiz-region-input"
                            className={classRegion}
                            value={this.state.quiz_region}
                            onChange={this.handleInputChange}
                            required>
                        {this.props.regions.map((region) => {
                            return (
                                <option key={region.id} value={region.id}>{region.name}</option>
                            );
                        })}
                    </select>
                    {'quiz_region' in this.state.validation_errors &&
                        <div className="invalid-feedback">
                            {this.state.validation_errors['quiz_region'][0]}
                        </div>
                    }
                </div>

                <div className="mb-3">
                    <label htmlFor="quiz-education-input" className="form-label">Zvolte Vámi dosažené nejvyšší
                        vzdělání</label>
                    <select name="quiz_education" id="quiz-education-input"
                            className={classEducation}
                            value={this.state.quiz_education}
                            onChange={this.handleInputChange}
                            required>
                        {this.props.educations.map((education) => {
                            return (
                                <option key={education.id} value={education.id}>{education.name}</option>
                            );
                        })}
                    </select>
                    {'quiz_education' in this.state.validation_errors &&
                        <div className="invalid-feedback">
                            {this.state.validation_errors['quiz_education'][0]}
                        </div>
                    }
                </div>

                <div className="mb-3">
                    <label htmlFor="quiz-party-input" className="form-label">Kterou stranu byste volil(a)?</label>
                    <select name="quiz_party" id="quiz-party-input"
                            className={classParty}
                            value={this.state.quiz_party}
                            onChange={this.handleInputChange}
                            required>
                        {this.props.parties.map((party) => {
                            return (
                                <option key={party.id} value={party.id}>{party.name}</option>
                            );
                        })}
                    </select>
                    {'quiz_party' in this.state.validation_errors &&
                        <div className="invalid-feedback">
                            {this.state.validation_errors['quiz_party'][0]}
                        </div>
                    }
                </div>

                <div className="mb-3">
                    <button type="submit" id="questionnaire-submit-btn" className="btn btn-primary">
                        {this.state.submit_btn}
                    </button>
                </div>
            </form>
        );
    }
}
