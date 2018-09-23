import React from "react";
import axios from "axios";

import { AlbumForm } from "./AlbumForm";
import { AlbumItem } from "./AlbumItem";

export class Work extends React.Component {
    constructor() {
        super();
        this.state = {
            auth: false,
            albums: [],
            openAlbum: {}
        };
    }
    //Get albums with all photos
    componentDidMount() {
        axios.defaults.baseURL = "http://photo.test/api/";
        axios.get("albums").then(res => {
            // console.log(res);
            this.setState({
                albums: res.data
            });
        });
    }
    albumHandler(album) {
        let link = "photos/" + album.id;
        axios.get(link).then(res => {
            this.setState({
                openAlbum: {
                    id: album.id,
                    name: album.name,
                    description: album.description,
                    res: res
                }
            });
        });
    }
    back() {
        this.setState({
            openAlbum: {}
        });
    }

    render() {
        if (!this.state.openAlbum.res) {
            return (
                <div className="work">
                    <h1 className="work__title">Galerijas</h1>
                    {this.state.auth ? <AlbumForm /> : null}
                    <div className="work__body">
                        {this.state.albums.map(album => (
                            <AlbumItem
                                onClick={() => this.albumHandler(album)}
                                key={album.id}
                                album={album}
                                auth={this.state.auth}
                            />
                        ))}
                    </div>
                </div>
            );
        } else {
            console.log(this.state.openAlbum);

            return (
                <div className="album">
                    <button onClick={() => this.back()}>Atpakaļ</button>
                    <h1 className="work__title">{}</h1>
                </div>
            );
        }
    }
}
