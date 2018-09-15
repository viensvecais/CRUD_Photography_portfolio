import React from "react";
import axios from "axios";

import { AlbumForm } from "./AlbumForm";

export class Work extends React.Component {
    constructor() {
        super();
        this.state = {
            auth: true,
            albums: []
        };
    }
    componentDidMount() {
        axios.get("http://photo.test/api/albums").then(res => {
            console.log(res);
            this.setState({
                albums: res.data
            });
        });
    }
    getRandomImage(album) {
        const min = 0;
        const max = album.photos.length;
        console.log(max);
        return Math.floor(Math.random() * (max - min)) + min;
    }

    render() {
        return (
            <div className="work">
                <h1 className="work__title">Galerijas</h1>
                {this.state.auth ? <AlbumForm /> : null}
                <ul className="work__body">
                    {this.state.albums.map(album => (
                        <li className="work__body__item" key={album.id}>
                            <h3 className="work__body__item__title">
                                {album.name}
                            </h3>
                            <h5 className="work__body__item__description">
                                {album.description}
                            </h5>
                            <img
                                className="work__body__item__background"
                                src={
                                    "./storage/images/album" +
                                    album.id +
                                    "/" +
                                    album.photos[this.getRandomImage(album)]
                                        .photo
                                }
                            />
                        </li>
                    ))}
                </ul>
            </div>
        );
    }
}
