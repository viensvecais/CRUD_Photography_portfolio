import React from "react";

export class AlbumForm extends React.Component {
    constructor(props) {
        super(props);
        this.toggleFormDisplay = this.toggleFormDisplay.bind(this);
        this.state = {
            formDisplay: false,
            title: "",
            description: ""
        };
    }
    toggleFormDisplay() {
        if (!this.state.formDisplay) {
            this.setState({ formDisplay: true });
        } else {
            this.setState({ formDisplay: false });
        }
    }
    change(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
    submit(e) {
        e.preventDefault();
        console.log(this.state);
    }

    render() {
        if (!this.state.formDisplay) {
            return (
                <div className="album-form">
                    <a
                        className="album-form__toggle"
                        onClick={this.toggleFormDisplay}
                    >
                        Pievienot jaunu Galeriju
                    </a>
                </div>
            );
        } else {
            return (
                <div className="album-form">
                    <a
                        className="album-form__toggle"
                        onClick={this.toggleFormDisplay}
                    >
                        Pievienot jaunu Galeriju
                    </a>
                    <form className="album-form__content">
                        <label className="album-form__content__title-label">
                            <h3>Virsraksts:</h3>
                            <input
                                name="title"
                                className="album-form__content__title-label_input"
                                type="text"
                                placeholder="Virsraksts"
                                value={this.state.title}
                                onChange={e => this.change(e)}
                            />
                            <h2 className="album-form__content__title-label_preview">
                                {this.state.title}
                            </h2>
                        </label>
                        <label className="album-form__content__description-label">
                            <h3>Apraksts:</h3>
                            <input
                                name="description"
                                className="album-form__content__description-label_input"
                                type="text"
                                placeholder="Apraksts"
                                value={this.state.description}
                                onChange={e => this.change(e)}
                            />
                            <h5 className="album-form__content__title-label_preview">
                                {this.state.description}
                            </h5>
                        </label>
                        <button onClick={e => this.submit(e)}>
                            Izveidot Albūmu
                        </button>
                    </form>
                </div>
            );
        }
    }
}
