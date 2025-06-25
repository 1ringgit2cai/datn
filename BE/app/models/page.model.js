const { DataTypes } = require("sequelize");
const sequelize = require("../config/db.config.js");

const Page = sequelize.define("page", {
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true
  },
  slug: {
    type: DataTypes.STRING,
    unique: true
  },
  title: {
    type: DataTypes.STRING,
    allowNull: false
  },
  content: {
    type: DataTypes.TEXT
  }
}, {
  tableName: "pages",
  timestamps: true
});

module.exports = Page;
