import React from "react";
import { Link } from "react-router-dom";

export class NotFound extends React.Component {
  render() {
    return (
      <main className="site-content">
        <section>
          <div className="container">
            <div className="row">
              <article className="post_404">
                <div className="h1 number-title c-accent">404</div>
                <h1 className="h1 page-not-found-title">Page Not Found</h1>
                <p>
                  The page you are looking for might have been removed, had its
                  name changed, or is temporarily unavailable.
                </p>
                <Link to="/" href="#" className="btn btn-1">
                  to homepage
                </Link>
              </article>
            </div>
          </div>
        </section>
      </main>
    );
  }
}
