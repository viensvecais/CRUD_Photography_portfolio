import React from "react";

export class AlbumItem extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            auth: this.props.auth,
            album: {},
            background: "",
            open: false
        };
    }
    //Insert API data
    componentWillMount() {
        this.setState({
            album: this.props.album
        });
    }
    //Create album preview image slider if there are images in the album
    componentDidMount() {
        //Choose the first image to display in the preview background
        if (this.props.album.photos.length > 0) {
            this.setState({
                background:
                    "./storage/images/album" +
                    this.props.album.id +
                    "/" +
                    this.props.album.photos[0].photo
            });
            //Change images with random interval
            this.interval = setInterval(() => {
                this.setState({
                    background:
                        "./storage/images/album" +
                        this.props.album.id +
                        "/" +
                        this.props.album.photos[this.getRandomImage()].photo
                });
            }, Math.floor(Math.random() * (8000 - 3000)) + 3000);
            //if there is no image in the album.
        } else {
            this.setState({
                background: "./images/no-image.png"
            });
        }
    }
    //Choose a random image from the album
    getRandomImage() {
        const min = 0;
        const max = this.state.album.photos.length;
        return Math.floor(Math.random() * (max - min)) + min;
    }
    componentWillUnmount() {
        clearInterval(this.interval);
    }
    render() {
        return (
            <button className="work__body__item" onClick={this.props.onClick}>
                {this.state.auth ? (
                    <button className="work__body__item__btn work__body__item__edit">
                        Labot
                    </button>
                ) : null}
                {this.state.auth ? (
                    <button className="work__body__item__btn work__body__item__delete">
                        Dzēst
                    </button>
                ) : null}
                <div className="work__body__item__text">
                    <h3 className="work__body__item__text__title">
                        {this.state.album.name}
                    </h3>
                    <h5 className="work__body__item__text__description">
                        {this.state.album.description}
                    </h5>
                </div>
                <img
                    className="work__body__item__background"
                    src={this.state.background}
                />
            </button>
        );
    }
}
