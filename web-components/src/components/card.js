import {html, LitElement} from "lit";

export class PkCard extends LitElement {
    static get properties() {
        return {
            data: {type: String},
        }
    }

    render() {
        return html`
            <div class="card">
                <p>${this.data}</p>
            </div>
        `;
    }
}
//<!-- wp:pinked/jcf-field { "slug": "imagen-post", "type": "text" } /-->